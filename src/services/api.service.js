import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import JwtService from './jwt.service'

window.axios = require('axios')

const ApiService = {

  init () {
    Vue.use(VueAxios, axios)
    Vue.axios.defaults.baseURL = '' // Vue.axios.defaults.baseURL = 'api/'
    Vue.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
  },

  setHeader () {
    Vue.axios.defaults.headers.common['Authorization'] = `Bearer ${JwtService.getToken()}`
  },

  query (resource, params) {
    return Vue.axios.get(resource, params).catch(error => {
      throw new Error(`[RWV] ApiService ${error}`)
    })
  },

  get (resource, slug = '') {
    if (JwtService.getToken() !== null) {
      this.setHeader()
    } else {
    }
    let params = ''
    if (!isNaN(slug) && slug) {
      params = '?' + slug
    }
    if (typeof (slug) === 'object') {
      params = '?' + _.keys(slug).filter(key => (slug[key] != null && slug[key] !== 'null'))
        .map(key => key + '=' + slug[key]).join('&')
    }
    return Vue.axios.get(`${resource}${params}`)
  },

  post (resource, params) {
    if (JwtService.getToken() !== null) {
      this.setHeader()
    } else {

    }
    return Vue.axios.post(`${resource}`, params)
  },

  update (resource, slug, params) {
    return Vue.axios.put(`${resource}/${slug}`, params)
  },

  put (resource, params) {
    return Vue.axios.put(`${resource}`, params)
  },

  delete (resource) {
    return Vue.axios.delete(resource)
  }

}

export default ApiService