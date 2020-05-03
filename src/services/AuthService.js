import { master } from '../helpers/master'
import axios from 'axios'

const AuthService = {
  register (form) {
    return axios.post(master.api('register'), form)
  },
  login (form) {
    return axios.post(master.api('oauth/token'), form)
  },
  logout () {
    return axios.get(master.api('oauth/logout')) // JR
    // return axios.post(master.api('oauth/logout')) // ORG
  },
  getAuthUser () {
    return axios.get(master.api('oauth/user'))
  }
}

export { AuthService }
