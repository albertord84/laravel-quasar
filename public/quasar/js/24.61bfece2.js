(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[24],{1947:function(e,t,r){},dc6d:function(e,t,r){"use strict";r.r(t);var n=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("q-page",{staticClass:"bg-gray q-pa-md"},[r("h6",[e._v("Histórico")])])},a=[],s=(r("8e6e"),r("8a81"),r("ac6a"),r("cadf"),r("06db"),r("456d"),r("a481"),r("967e")),o=r.n(s),i=(r("96cf"),r("fa84")),u=r.n(i),c=r("c47a"),f=r.n(c),p=r("2f62"),h=r("b012"),d=r("6fea"),l=r("2ef0"),b=r.n(l);function m(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function w(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?m(Object(r),!0).forEach((function(t){f()(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):m(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var v={name:"Questionaries",components:{},data:function(){return{loader:!1,form:{username:null,password:null,grant_type:"password"},form_rules:{username:"required|max:50",password:"required|min:8",grant_type:"required"},window:{width:0,height:0}}},methods:w({},Object(p["b"])("auth",["setAuthStatus","setUserData","storeToken"]),{submit:function(){var e=this;return u()(o.a.mark((function t(){var r;return o.a.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$refs.observer.validate();case 2:if(r=t.sent,r){t.next=5;break}return t.abrupt("return",!1);case 5:e.login();case 6:case"end":return t.stop()}}),t)})))()},hasErrors:function(e){return!b.a.isEmpty(e)},login:function(){var e=this;this.loader=!0,h["a"].login(this.form).then((function(t){e.storeToken(t),e.setAuthStatus(!0),e.setUserData(b.a.get(t,["data","user_data"],{}));var r=b.a.get(e.$route,["query","redirect"]);r?e.$router.replace(r):e.$router.replace({name:"auth.user"})})).catch((function(t){var r=d["a"].hasErrors(t);r&&d["a"].setErrors(e.$refs.observer,r)})).then((function(){e.loader=!1}))}}),watch:{"form.username":function(e){this.$refs.observer.$data.isAuth&&(this.$refs.observer.$data.isAuth=!1,this.$refs.password.reset())},"form.password":function(e){this.$refs.observer.$data.isAuth&&(this.$refs.observer.$data.isAuth=!1,this.$refs.username.reset())}},computed:w({},Object(p["c"])("auth",["isAuth"])),created:function(){},destroyed:function(){},beforeRouteEnter:function(e,t,r){r((function(e){e.isAuth&&e.$router.replace({name:"public.index"})}))},meta:function(){return{title:this.$t("page_titles.login_title")}}},g=v,O=(r("f1e0"),r("2877")),$=Object(O["a"])(g,n,a,!1,null,"193129f0",null);t["default"]=$.exports},f1e0:function(e,t,r){"use strict";var n=r("1947"),a=r.n(n);a.a}}]);