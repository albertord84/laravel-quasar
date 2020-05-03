(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[23],{"2c89":function(e,r,t){"use strict";var s=t("3c16"),a=t.n(s);a.a},"3c16":function(e,r,t){},d4ad:function(e,r,t){"use strict";t.r(r);var s=function(){var e=this,r=e.$createElement,s=e._self._c||r;return s("q-page",{staticClass:"page-background"},[s("div",{staticClass:"fixed-center login-form"},[s("div",{},[s("q-card",{},[s("q-card-section",[s("validation-observer",{ref:"observer",scopedSlots:e._u([{key:"default",fn:function(r){var a=r.valid;return[s("q-form",[s("div",{staticClass:"text-center"},[s("img",{attrs:{src:t("e702"),alt:"",width:"140em"}}),s("p",{staticClass:"text-h6 text-center q-pb-sm"},[e._v("\n                  "+e._s(e.$t("login.title"))+"\n                ")])]),s("validation-provider",{ref:"username",attrs:{vid:"username",name:e.$t("login.form.username"),rules:e.form_rules.username},scopedSlots:e._u([{key:"default",fn:function(r){var t=r.errors;return[s("div",{},[s("q-input",{attrs:{id:"username",name:"username",type:"text",label:e.$t("login.form.username"),error:e.hasErrors(t),"error-message":t[0]},scopedSlots:e._u([{key:"prepend",fn:function(){return[s("q-icon",{attrs:{name:"perm_identity"}})]},proxy:!0}],null,!0),model:{value:e.form.username,callback:function(r){e.$set(e.form,"username",r)},expression:"form.username"}})],1)]}}],null,!0)}),s("validation-provider",{ref:"password",attrs:{vid:"password",name:e.$t("login.form.password"),rules:e.form_rules.password},scopedSlots:e._u([{key:"default",fn:function(r){var t=r.errors;return[s("div",{},[s("q-input",{attrs:{id:"password",name:"password",type:"password",label:e.$t("login.form.password"),error:e.hasErrors(t),"error-message":t[0]},scopedSlots:e._u([{key:"prepend",fn:function(){return[s("q-icon",{attrs:{name:"lock"}})]},proxy:!0}],null,!0),model:{value:e.form.password,callback:function(r){e.$set(e.form,"password",r)},expression:"form.password"}})],1)]}}],null,!0)}),s("div",{staticClass:"text-center"},[s("q-btn",{staticClass:"q-mt-md",attrs:{type:"submit",loading:e.loader,disable:!a,label:e.$t("login.title"),color:"teal"},on:{click:e.submit},scopedSlots:e._u([{key:"loading",fn:function(){return[s("q-spinner")]},proxy:!0}],null,!0)})],1),s("div",{staticClass:"q-mt-lg text-right"},[e._v("Ainda não tem conta?\n                "),s("router-link",{attrs:{to:{name:"public.register"}}},[e._v("Crie uma agora")])],1),s("div",{staticClass:"q-mt-sm text-right"},[s("router-link",{attrs:{to:{name:"public.register"}}},[e._v("Recupere sua senha")])],1)],1)]}}])})],1)],1)],1)])])},a=[],n=(t("8e6e"),t("8a81"),t("ac6a"),t("cadf"),t("06db"),t("456d"),t("a481"),t("967e")),o=t.n(n),i=(t("96cf"),t("fa84")),u=t.n(i),c=t("c47a"),l=t.n(c),d=t("2f62"),f=t("b012"),p=t("6fea"),m=t("2ef0"),b=t.n(m),v=t("7bb1"),h=t("039f");function g(e,r){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(e);r&&(s=s.filter((function(r){return Object.getOwnPropertyDescriptor(e,r).enumerable}))),t.push.apply(t,s)}return t}function w(e){for(var r=1;r<arguments.length;r++){var t=null!=arguments[r]?arguments[r]:{};r%2?g(Object(t),!0).forEach((function(r){l()(e,r,t[r])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):g(Object(t)).forEach((function(r){Object.defineProperty(e,r,Object.getOwnPropertyDescriptor(t,r))}))}return e}var y={name:"Login",components:{ValidationObserver:v["a"],ValidationProvider:h["ValidationProvider"]},data:function(){return{loader:!1,form:{username:null,password:null,grant_type:"password"},form_rules:{username:"required|max:50",password:"required|min:8",grant_type:"required"}}},methods:w({},Object(d["b"])("auth",["setAuthStatus","setUserData","storeToken"]),{submit:function(){var e=this;return u()(o.a.mark((function r(){var t;return o.a.wrap((function(r){while(1)switch(r.prev=r.next){case 0:return r.next=2,e.$refs.observer.validate();case 2:if(t=r.sent,t){r.next=5;break}return r.abrupt("return",!1);case 5:e.login();case 6:case"end":return r.stop()}}),r)})))()},hasErrors:function(e){return!b.a.isEmpty(e)},login:function(){var e=this;this.loader=!0,f["a"].login(this.form).then((function(r){e.storeToken(r),e.setAuthStatus(!0),e.setUserData(b.a.get(r,["data","user_data"],{})),e.$router.replace({name:"target.dashboard"})})).catch((function(r){var t=p["a"].hasErrors(r);t&&p["a"].setErrors(e.$refs.observer,t)})).then((function(){e.loader=!1}))}}),watch:{"form.username":function(e){this.$refs.observer.$data.isAuth&&(this.$refs.observer.$data.isAuth=!1,this.$refs.password.reset())},"form.password":function(e){this.$refs.observer.$data.isAuth&&(this.$refs.observer.$data.isAuth=!1,this.$refs.username.reset())}},computed:w({},Object(d["c"])("auth",["isAuth"])),beforeRouteEnter:function(e,r,t){t((function(e){e.isAuth&&e.$router.replace({name:"public.index"})}))},meta:function(){return{title:this.$t("page_titles.login_title")}}},$=y,_=(t("2c89"),t("2877")),O=Object(_["a"])($,s,a,!1,null,"4676eb05",null);r["default"]=O.exports}}]);