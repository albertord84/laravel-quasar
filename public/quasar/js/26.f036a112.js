(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[26],{7877:function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("q-layout",{attrs:{view:"hHh Lpr fFf"}},[r("q-header",{staticClass:"bg-orange-8"},[r("q-toolbar",{staticClass:"q-pa-md"},[r("q-btn",{staticClass:"q-mr-sm gt-xs",attrs:{flat:"",round:"",dense:"",icon:"menu"},on:{click:function(e){t.leftDrawer=!t.leftDrawer}}}),r("img",{staticClass:"q-ml-sm q-sm-md hover-pointer",attrs:{src:a("e702"),alt:"Logo",width:"35rem",height:"35rem"}}),r("q-toolbar-title",[r("b",{staticClass:"hover-pointer"},[t._v("PhysiBack")])]),r("q-btn-dropdown",{attrs:{stretch:"",shrink:"",flat:"",icon:"account_circle"}},[r("q-list",[r("q-item",{attrs:{clickable:"",tabindex:"0"}},[r("q-item-section",[r("q-item-label",[t._v("Editar perfil")])],1),r("q-item-section",{attrs:{side:""}},[r("q-icon",{staticClass:"cl-orange-14",attrs:{name:"edit"}})],1)],1),r("q-item",{attrs:{clickable:"",tabindex:"0"},on:{click:function(e){return t.logout(t.$router)}}},[r("q-item-section",[r("q-item-label",[t._v("Encerrar sessão")])],1),r("q-item-section",{attrs:{side:""}},[r("q-icon",{staticClass:"cl-orange-14",attrs:{name:"exit_to_app"}})],1)],1)],1)],1)],1),r("q-toolbar",{staticClass:"flex justify-between q-px-md xs"},[r("q-btn",{staticClass:"q-mr-sm",attrs:{to:"/target",flat:"",round:"",dense:"",icon:"home"}}),r("q-btn",{staticClass:"q-mr-sm",attrs:{to:"/target/questionaries",flat:"",round:"",dense:"",icon:"list_alt"}},[r("q-badge",{attrs:{color:"green-13","text-color":"white","multi-line":"",floating:""}},[t._v("2")])],1),r("q-btn",{staticClass:"q-mr-sm",attrs:{to:"/target/payment",flat:"",round:"",dense:"",icon:"money"}}),r("q-btn",{staticClass:"q-mr-sm",attrs:{to:"/target/notifications",flat:"",round:"",dense:"",icon:"notifications"}},[r("q-badge",{attrs:{color:"red","text-color":"white","multi-line":"",floating:""}},[t._v("4")])],1),r("q-btn",{staticClass:"q-mr-sm",attrs:{to:"/target/contactus",flat:"",round:"",dense:"",icon:"mail_outline"}})],1)],1),r("q-drawer",{attrs:{side:"left",breakpoint:500,bordered:"","content-class":"bg-grey-8"},model:{value:t.leftDrawer,callback:function(e){t.leftDrawer=e},expression:"leftDrawer"}},[r("q-scroll-area",{staticClass:"fit"},t._l(t.menuList,(function(e,a){return r("q-list",{key:a},[r("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],attrs:{to:e.link,clickable:"",active:"Questionários"===e.label},on:{click:function(e){return t.setSelected(a)}}},[r("q-item-section",{attrs:{avatar:""}},[r("q-icon",{staticStyle:{color:"white"},attrs:{name:e.icon}})],1),r("q-item-section",{staticStyle:{color:"white"}},[t._v("\n                        "+t._s(e.label)+"\n                    ")])],1)],1)})),1)],1),r("q-page-container",{staticClass:"content-top"},[r("router-view")],1)],1)},s=[],n=(a("8e6e"),a("8a81"),a("ac6a"),a("cadf"),a("06db"),a("456d"),a("c47a")),i=a.n(n),o=a("2f62");function c(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),a.push.apply(a,r)}return a}function l(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?c(Object(a),!0).forEach((function(e){i()(t,e,a[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):c(Object(a)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))}))}return t}var u={name:"LayoutTarget",data:function(){return{leftDrawer:!0,menuList:[{icon:"home",label:"Dashboard",link:"/target/dashboard",selected:!0,separator:!1},{icon:"list_alt",label:"Questionários",link:"/target/questionaries",selected:!1,separator:!1},{icon:"storage",label:"Pagamento",link:"/target/payment",selected:!1,separator:!1},{icon:"notifications",label:"Notificações",link:"/target/notifications",selected:!1,separator:!1},{icon:"mail_outline",label:"Contato",link:"/target/contactus",selected:!1,separator:!1}]}},methods:l({setSelected:function(t){var e=this;this.menuList.some((function(a,r){e.menuList[r].selected=!1,r===t&&(e.menuList[r].selected=!0)}))}},Object(o["b"])("auth",["logout"]))},m=u,f=(a("9871"),a("2877")),b=Object(f["a"])(m,r,s,!1,null,"7c660fb6",null);e["default"]=b.exports},9871:function(t,e,a){"use strict";var r=a("a381"),s=a.n(r);s.a},a381:function(t,e,a){},e702:function(t,e,a){t.exports=a.p+"img/physiback.59942f5a.png"}}]);