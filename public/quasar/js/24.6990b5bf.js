(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[24],{"70bb":function(e,r,t){},a8f4:function(e,r,t){"use strict";var n=t("70bb"),a=t.n(n);a.a},b68b:function(e,r,t){"use strict";t.r(r);var n=function(){var e=this,r=e.$createElement,n=e._self._c||r;return n("q-page",{staticClass:"page-background flex"},[n("div",{},[n("div",{staticClass:"text-center "},[n("q-card",{staticStyle:{position:"relative"}},[n("q-card-section",[n("validation-observer",{ref:"observer",scopedSlots:e._u([{key:"default",fn:function(r){var a=r.valid;return[n("q-form",[n("div",{staticClass:"text-center"},[n("img",{attrs:{src:t("e702"),alt:"",width:"140em"}}),n("p",{staticClass:"text-h6 text-center q-pb-sm"},[e._v("\n                  "+e._s(e.$t("register.title"))+"\n                ")])]),n("validation-provider",{attrs:{vid:"username",name:e.$t("register.form.username"),rules:e.form_rules.username},scopedSlots:e._u([{key:"default",fn:function(r){var t=r.errors;return[n("div",{},[n("q-input",{attrs:{id:"username",name:"username",type:"text",label:e.$t("register.form.username"),error:e.hasErrors(t),"error-message":t[0]},scopedSlots:e._u([{key:"prepend",fn:function(){return[n("q-icon",{attrs:{name:"perm_identity"}})]},proxy:!0}],null,!0),model:{value:e.form.username,callback:function(r){e.$set(e.form,"username",r)},expression:"form.username"}})],1)]}}],null,!0)}),n("validation-provider",{attrs:{vid:"email",name:e.$t("register.form.email"),rules:e.form_rules.email},scopedSlots:e._u([{key:"default",fn:function(r){var t=r.errors;return[n("div",{},[n("q-input",{attrs:{id:"email",name:"email",type:"email",label:e.$t("register.form.email"),error:e.hasErrors(t),"error-message":t[0]},scopedSlots:e._u([{key:"prepend",fn:function(){return[n("q-icon",{attrs:{name:"alternate_email"}})]},proxy:!0}],null,!0),model:{value:e.form.email,callback:function(r){e.$set(e.form,"email",r)},expression:"form.email"}})],1)]}}],null,!0)}),n("validation-provider",{attrs:{vid:"email_confirmation",name:e.$t("register.form.email_confirmation"),rules:e.form_rules.email_confirmation},scopedSlots:e._u([{key:"default",fn:function(r){var t=r.errors;return[n("div",{},[n("q-input",{attrs:{id:"email_confirmation",name:"email_confirmation",type:"email",label:e.$t("register.form.email_confirmation"),error:e.hasErrors(t),"error-message":t[0]},scopedSlots:e._u([{key:"prepend",fn:function(){return[n("q-icon",{attrs:{name:"alternate_email"}})]},proxy:!0}],null,!0),model:{value:e.form.email_confirmation,callback:function(r){e.$set(e.form,"email_confirmation",r)},expression:"form.email_confirmation"}})],1)]}}],null,!0)}),n("validation-provider",{attrs:{vid:"password",name:e.$t("register.form.password"),rules:e.form_rules.password},scopedSlots:e._u([{key:"default",fn:function(r){var t=r.errors;return[n("div",{},[n("q-input",{attrs:{id:"password",name:"password",type:"password",label:e.$t("register.form.password"),error:e.hasErrors(t),"error-message":t[0]},scopedSlots:e._u([{key:"prepend",fn:function(){return[n("q-icon",{attrs:{name:"lock"}})]},proxy:!0}],null,!0),model:{value:e.form.password,callback:function(r){e.$set(e.form,"password",r)},expression:"form.password"}})],1)]}}],null,!0)}),n("validation-provider",{attrs:{vid:"password_confirmation",name:e.$t("register.form.password_confirmation"),rules:e.form_rules.password_confirmation},scopedSlots:e._u([{key:"default",fn:function(r){var t=r.errors;return[n("div",{},[n("q-input",{attrs:{id:"password_confirmation",name:"password_confirmation",type:"password",label:e.$t("register.form.password_confirmation"),error:e.hasErrors(t),"error-message":t[0]},scopedSlots:e._u([{key:"prepend",fn:function(){return[n("q-icon",{attrs:{name:"lock"}})]},proxy:!0}],null,!0),model:{value:e.form.password_confirmation,callback:function(r){e.$set(e.form,"password_confirmation",r)},expression:"form.password_confirmation"}})],1)]}}],null,!0)}),n("div",{staticClass:"text-center"},[n("q-btn",{staticClass:"q-mt-md",attrs:{type:"submit",loading:e.loader,disable:!a,label:e.$t("register.title"),color:"teal"},on:{click:e.submit},scopedSlots:e._u([{key:"loading",fn:function(){return[n("q-spinner")]},proxy:!0}],null,!0)})],1)],1)]}}])})],1)],1)],1)])])},a=[],o=(t("8e6e"),t("8a81"),t("ac6a"),t("cadf"),t("06db"),t("456d"),t("c47a")),s=t.n(o),i=(t("a481"),t("967e")),l=t.n(i),u=(t("96cf"),t("fa84")),c=t.n(u),m=t("2f62"),f=t("b012"),d=t("6fea"),p=t("7bb1"),v=t("039f"),b=t("2ef0"),_=t.n(b);function g(e,r){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);r&&(n=n.filter((function(r){return Object.getOwnPropertyDescriptor(e,r).enumerable}))),t.push.apply(t,n)}return t}function w(e){for(var r=1;r<arguments.length;r++){var t=null!=arguments[r]?arguments[r]:{};r%2?g(Object(t),!0).forEach((function(r){s()(e,r,t[r])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):g(Object(t)).forEach((function(r){Object.defineProperty(e,r,Object.getOwnPropertyDescriptor(t,r))}))}return e}var y={name:"Register",components:{ValidationObserver:p["a"],ValidationProvider:v["ValidationProvider"]},data:function(){return{loader:!1,form:{username:null,email:null,email_confirmation:null,password:null,password_confirmation:null},form_rules:{username:"required|alpha_num|max:50",email:"required|email|max:50",email_confirmation:"required|confirmed:email",password:{required:!0,min:8,regex:/(^[\S]{8,}$)/},password_confirmation:"required|confirmed:password"}}},methods:{hasErrors:function(e){return!_.a.isEmpty(e)},submit:function(){var e=this;return c()(l.a.mark((function r(){var t;return l.a.wrap((function(r){while(1)switch(r.prev=r.next){case 0:return r.next=2,e.$refs.observer.validate();case 2:if(t=r.sent,t){r.next=5;break}return r.abrupt("return",!1);case 5:e.register();case 6:case"end":return r.stop()}}),r)})))()},register:function(){var e=this;this.loader=!0,f["a"].register(this.form).then((function(r){e.$q.notify({message:e.$t("register.success_register"),type:"positive"}),e.$router.replace({name:"public.login"})})).catch((function(r){var t=d["a"].hasErrors(r);t&&d["a"].setErrors(e.$refs.observer,t)})).then((function(){e.loader=!1}))}},computed:w({},Object(m["c"])("auth",["isAuth"])),beforeRouteEnter:function(e,r,t){t((function(e){e.isAuth&&e.$router.replace({name:"public.index"})}))},meta:function(){return{title:this.$t("page_titles.register_title")}}},h=y,k=(t("a8f4"),t("2877")),x=Object(k["a"])(h,n,a,!1,null,"c58310f6",null);r["default"]=x.exports}}]);