(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[12],{"5fcd":function(e,t,a){},"861d":function(e,t,a){"use strict";a.r(t);var r=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("q-layout",{attrs:{view:"hHh Lpr fFf"}},[r("q-header",{staticClass:"bg-orange-8"},[r("q-toolbar",{staticClass:"q-pa-md"},[r("q-btn",{staticClass:"q-mr-sm",attrs:{flat:"",round:"",dense:"",icon:"menu"},on:{click:function(t){e.leftDrawer=!e.leftDrawer}}}),r("img",{staticClass:"q-ml-sm q-sm-md hover-pointer",attrs:{src:a("e702"),alt:"Logo",width:"35rem",height:"35rem"}}),r("q-toolbar-title",[r("b",{staticClass:"hover-pointer"},[e._v("PhysiBack")])]),r("q-btn-dropdown",{attrs:{stretch:"",shrink:"",flat:"",icon:"account_circle"}},[r("q-list",[r("q-item",{directives:[{name:"close-menu",rawName:"v-close-menu"}],attrs:{clickable:"",tabindex:"0"}},[r("q-item-section",[r("q-item-label",[e._v("Editar perfil")])],1),r("q-item-section",{attrs:{side:""}},[r("q-icon",{staticClass:"cl-orange-14",attrs:{name:"edit"}})],1)],1),r("q-item",{directives:[{name:"close-menu",rawName:"v-close-menu"}],attrs:{clickable:"",tabindex:"0"}},[r("q-item-section",[r("q-item-label",[e._v("Encerrar sessão")])],1),r("q-item-section",{attrs:{side:""}},[r("q-icon",{staticClass:"cl-orange-14",attrs:{name:"exit_to_app"}})],1)],1)],1)],1)],1)],1),r("q-drawer",{attrs:{"show-if-above":"",side:"left",breakpoint:500,bordered:"","content-class":"bg-grey-8"},model:{value:e.leftDrawer,callback:function(t){e.leftDrawer=t},expression:"leftDrawer"}},[r("q-scroll-area",{staticClass:"fit"},e._l(e.menuList,(function(t,a){return r("q-list",{key:a},[r("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{to:t.link,clickable:"",active:"Questionários"===t.label},on:{click:function(t){return e.setSelected(a)}}},[r("q-item-section",{attrs:{avatar:""}},[r("q-icon",{staticStyle:{color:"white"},attrs:{name:t.icon}})],1),r("q-item-section",{staticStyle:{color:"white"}},[e._v("\n                        "+e._s(t.label)+"\n                    ")])],1)],1)})),1)],1),r("q-page-container",{staticStyle:{"padding-top":"1.2rem !important"}},[r("router-view")],1)],1)},i=[],s=(a("8e6e"),a("8a81"),a("ac6a"),a("cadf"),a("06db"),a("456d"),a("c47a")),n=a.n(s),c=a("2f62");function o(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,r)}return a}function l(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?o(Object(a),!0).forEach((function(t){n()(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):o(Object(a)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}var m={name:"LayoutAdmin",data:function(){return{leftDrawer:!0,menuList:[{icon:"home",label:"Dashboard",link:"/admin",selected:"true",separator:!1},{icon:"list_alt",label:"Questionários",link:"/admin/questionaries",selected:!1,separator:!1},{icon:"style",label:"Campanhas",link:"/admin/campaigns",selected:!1,separator:!1},{icon:"storage",label:"Bases",link:"/admin/bases",selected:!1,separator:!1},{icon:"group",label:"Usuários",link:"/admin/users",selected:!1,separator:!1},{icon:"history",label:"Histórico",link:"/admin/history",selected:!1,separator:!1}]}},methods:l({setSelected:function(e){var t=this;this.menuList.some((function(a,r){t.menuList[r].selected=!1,r===e&&(t.menuList[r].selected=!0)}))}},Object(c["b"])("auth",["logout"]))},u=m,d=(a("e4cf"),a("2877")),b=Object(d["a"])(u,r,i,!1,null,"8a77744a",null);t["default"]=b.exports},e4cf:function(e,t,a){"use strict";var r=a("5fcd"),i=a.n(r);i.a}}]);