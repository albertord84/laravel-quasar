(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[2],{6001:function(e,t,a){"use strict";var s=a("a4e5"),n=a.n(s);n.a},"6eaf":function(e,t,a){"use strict";var s=a("8a98"),n=a.n(s);n.a},"79eb":function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"row justify-left"},[e._m(0),a("q-separator",{staticClass:"col-12 q-pa-none q-ma-none"}),1==e.userLoggued.role_id?a("div",{staticClass:"col-6 q-px-xs q-mt-lg"},[a("span",[e._v("Origem da base (*) ")]),a("q-select",{staticClass:"col-12 q-mt-sm",attrs:{options:e.optionsBasesOrg,filled:"","label-color":"orange-8",color:"orange-8","hide-selected":"","fill-input":"","input-debounce":"0",label:"",clearable:"","use-input":""},on:{filter:e.filterFnAutoselectBaseOrigin,"filter-abort":e.abortFilterFnBasesOrigin},scopedSlots:e._u([{key:"no-option",fn:function(){return[a("q-item",[a("q-item-section",{staticClass:"text-grey"},[e._v("\n              Origem das bases\n            ")])],1)]},proxy:!0}],null,!1,365097503),model:{value:e.selectedBaseOrigin,callback:function(t){e.selectedBaseOrigin=t},expression:"selectedBaseOrigin"}})],1):e._e(),1==e.userLoggued.role_id?a("div",{staticClass:"col-6 q-px-xs q-mt-lg"},[a("span",[e._v("Atribuir empresa (*) ")]),a("q-select",{staticClass:"col-12 q-mt-sm",attrs:{options:e.optionsCompanies,filled:"","label-color":"orange-8",color:"orange-8","hide-selected":"","fill-input":"","input-debounce":"0",label:"",clearable:"","use-input":""},on:{filter:e.filterFnAutoselectCompany,"filter-abort":e.abortFilterFnCompany},scopedSlots:e._u([{key:"no-option",fn:function(){return[a("q-item",[a("q-item-section",{staticClass:"text-grey"},[e._v("\n              Empresas cadastradas\n            ")])],1)]},proxy:!0}],null,!1,3770499967),model:{value:e.selectedBaseCompany,callback:function(t){e.selectedBaseCompany=t},expression:"selectedBaseCompany"}})],1):e._e(),a("div",{staticClass:"col-6 q-px-xs q-mt-lg"},[a("span",[e._v("Nome (*)")]),a("q-input",{staticClass:"col-12 q-mt-sm",attrs:{filled:"",square:"","label-color":"orange-8",color:"orange-8"},model:{value:e.baseModel.name,callback:function(t){e.$set(e.baseModel,"name",t)},expression:"baseModel.name"}})],1),a("div",{staticClass:"col-6 q-px-xs q-mt-lg"},[a("span",[e._v("Descrição")]),a("q-input",{staticClass:"col-12 q-mt-sm",attrs:{filled:"",square:"","label-color":"orange-8",color:"orange-8"},model:{value:e.baseModel.decription,callback:function(t){e.$set(e.baseModel,"decription",t)},expression:"baseModel.decription"}})],1),a("div",{staticClass:"col-11 q-px-xs q-mt-lg"},[a("span",[e._v("Selecionar arquivo CSV da base (*) "),a("q-icon",{staticClass:"q-mb-sm q-ml-xs",attrs:{color:"primary",size:"1.2rem",name:"help"},on:{click:function(t){e.modalHelpCSVFile=!0}}})],1),a("q-input",{staticClass:"col-12 q-mt-sm",attrs:{filled:"",square:"","label-color":"orange-8",color:"orange-8"},scopedSlots:e._u([{key:"append",fn:function(){return[a("q-icon",{directives:[{name:"show",rawName:"v-show",value:e.fileInputCSV,expression:"fileInputCSV"}],staticClass:"pointer-hover",attrs:{name:"highlight_off",color:"red"},on:{click:function(t){t.preventDefault(),e.fileInputCSV=null,e.fileInputCSVFullPath=""}}})]},proxy:!0}]),model:{value:e.fileInputCSVFullPath,callback:function(t){e.fileInputCSVFullPath=t},expression:"fileInputCSVFullPath"}})],1),a("div",{staticClass:"col-1 q-mt-xl"},[a("input",{ref:"fileInputCSV",staticStyle:{display:"none"},attrs:{type:"file",accept:".csv"},on:{change:function(t){return t.preventDefault(),e.getFileSelected(t)}}}),a("q-btn",{staticClass:"q-pa-sm q-mt-sm q-mb-sm bg-orange-8",staticStyle:{"margin-top":"0.8rem"},attrs:{"text-color":"white",label:"",title:"Selecionar arquivo CSV",icon:"vertical_align_top"},on:{click:e.triggerEvent}})],1),a("div",{staticClass:"col-12 flex q-my-md justify-between"},[a("span",{staticClass:"q-mt-sm",staticStyle:{"font-size":"1.2rem"}},[e._v("Finalizar "+e._s("insert"===e.action?"criação":"edição")+" da base")])]),a("q-separator",{staticClass:"col-12 q-pa-none q-ma-none"}),a("div",{staticClass:"q-my-md"},[a("q-btn",{staticClass:"q-pa-sm q-mb-sm bg-orange-8",attrs:{"text-color":"white",loading:e.isCreatingBase,label:"Guardar base",title:"Guardar base",icon:"save"},on:{click:function(t){return t.preventDefault(),e.addBase(t)}},scopedSlots:e._u([{key:"loading",fn:function(){return[a("q-spinner")]},proxy:!0}])})],1),a("q-dialog",{attrs:{persistent:"","transition-show":"flip-down","transition-hide":"flip-up"},model:{value:e.modalHelpCSVFile,callback:function(t){e.modalHelpCSVFile=t},expression:"modalHelpCSVFile"}},[a("q-card",[a("q-card-section",{staticClass:"row items-center"},[a("q-icon",{staticClass:"text-primary",staticStyle:{"font-size":"1.9rem"},attrs:{name:"info"}}),a("span",{staticClass:"q-ml-sm"},[e._v("Aqui você deve selecionar o arquivo com extensão .csv ("),a("i",[e._v("comma-separated-values")]),e._v(") com os dados dos usuários da base que está sendo criada.\n            "),a("br"),e._v("Esse arquivo deve possuir uma formatação espefífica. Descarregue a planilha template e preencha com os dados dos usuários da base.")])],1),a("q-card-actions",{attrs:{align:"right"}},[a("a",{ref:"lnkDownloadTemplate",attrs:{href:e.app_url+"/external_files/planilha_base_usuarios.csv",download:""}}),a("q-btn",{attrs:{flat:"",label:"Descarregar planilha",color:"orange-8"},on:{click:e.downloadTemplate}}),a("q-btn",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{flat:"",label:"Cancelar",color:"gray"}})],1)],1)],1)],1)},n=[function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"col-12 flex q-mt-xs justify-between"},[a("span",{staticClass:"q-mt-sm",staticStyle:{"font-size":"1.2rem"}},[e._v("Dados gerais")])])}],i=(a("7f7f"),a("551c"),a("06db"),a("097d"),a("2034")),o={name:"CrudCampaigns",props:{action:null,company:null},data:function(){return{baseModel:{id:0,origin_id:0,company_id:0,criator_id:0,name:"",description:"",json_data:"",created_at:"",updated_at:""},fileInputCSV:null,fileInputCSVFullPath:"",modalHelpCSVFile:!1,selectedBaseOrigin:"",selectedBaseOrg:{},listBasesOrg:[],stringOptionsBaseOrg:[],optionsBasesOrg:[],selectedBaseCompany:"",selectedCompany:{},listCompanies:[],stringOptionsCompanies:[],optionsCompanies:[],userLoggued:{role_id:1},isCreatingBase:!1,app_url:""}},methods:{addBase:function(){var e=this;this.validateBaseModel()&&(this.isCreatingBase=!0,i["a"].put("web/criateFullBase",{campaign:this.baseModel}).then((function(t){e.isCreatingBase=!1,e.$q.notify({type:"positive",color:"teal-3",message:"Base criada com sucesso.",position:"top-right"}),e.$emit("reloadBases")})).catch((function(t){e.$q.notify({type:"negative",message:"Erro criando base.",position:"top-right"}),e.isCreatingBase=!1,console.log(t)})).finally((function(){e.isCreatingBase=!1})))},prepareToUpdateBase:function(){},updateBase:function(){},getBasesOrigins:function(){var e=this;i["a"].get("web/basesOrigins").then((function(t){e.stringOptionsBaseOrg=[],t.data.some((function(t,a){e.stringOptionsBaseOrg.push(t.name)})),e.listBasesOrg=t.data})).catch((function(e){})).then((function(){}))},getCompanies:function(){var e=this;i["a"].get("web/companies").then((function(t){e.stringOptionsCompanies=[],t.data.some((function(t,a){e.stringOptionsCompanies.push(t.fantasy_name)})),e.listCompanies=t.data})).catch((function(e){})).then((function(){}))},selectedBaseOriginByName:function(e){if(""===e.trim())return null;var t=null;return this.listBasesOrg.some((function(a,s){a.name===e&&(t=a)})),t},selectedCompanyByName:function(e){if(""===e.trim())return null;var t=null;return this.listCompanies.some((function(a,s){a.fantasy_name===e&&(t=a)})),t},filterFnAutoselectBaseOrigin:function(e,t,a){var s=this;setTimeout((function(){t((function(){if(""===e)s.optionsBasesOrg=s.stringOptionsBaseOrg;else{var t=e.toLowerCase();s.optionsBasesOrg=s.stringOptionsBaseOrg.filter((function(e){return e.toLowerCase().indexOf(t)>-1}))}}),(function(t){""!==e&&t.options.length>0&&-1===t.optionIndex&&(t.moveOptionSelection(1,!0),t.toggleOption(t.options[t.optionIndex],!0))}))}),300)},abortFilterFnBasesOrigin:function(){this.selectedBaseOrigin=""},filterFnAutoselectCompany:function(e,t,a){var s=this;setTimeout((function(){t((function(){if(""===e)s.optionsCompanies=s.stringOptionsCompanies;else{var t=e.toLowerCase();s.optionsCompanies=s.stringOptionsCompanies.filter((function(e){return e.toLowerCase().indexOf(t)>-1}))}}),(function(t){""!==e&&t.options.length>0&&-1===t.optionIndex&&(t.moveOptionSelection(1,!0),t.toggleOption(t.options[t.optionIndex],!0))}))}),300)},abortFilterFnCompany:function(){this.selectedBaseCompany=""},validateBaseModel:function(){if(1===this.userLoggued.role_id){if(this.selectedBaseOrg=this.selectedBaseOriginByName(this.selectedBaseOrigin),!this.selectedBaseOrg)return this.$q.notify({type:"negative",message:"O campo Origem da base é obrigatório.",position:"top-right"}),!1;this.baseModel.origin_id=this.selectedBaseOrg.id}if(1===this.userLoggued.role_id){if(this.selectedCompany=this.selectedCompanyByName(this.selectedBaseCompany),!this.selectedCompany)return this.$q.notify({type:"negative",message:"O campo Atribuir empresa é obrigatório.",position:"top-right"}),!1;this.baseModel.company_id=this.selectedCompany.id}return""===this.baseModel.name.trim()?(this.$q.notify({type:"negative",message:"O campo Nome é obrigatório.",position:"top-right"}),!1):!!this.fileInputCSV||(this.$q.notify({type:"negative",message:"Deve selecionar um arquivo CSV com a base de usuários.",position:"top-right"}),!1)},triggerEvent:function(){this.fileInputCSV=null,this.$refs.fileInputCSV.click()},getFileSelected:function(e){this.fileInputCSV=e.target.files[0],this.fileInputCSV&&(this.fileInputCSVFullPath=this.fileInputCSV.name)},downloadTemplate:function(){this.$refs.lnkDownloadTemplate.click()}},watch:{},beforeMount:function(){this.getBasesOrigins(),this.getCompanies(),this.app_url=Object({NODE_ENV:"production",CLIENT:!0,SERVER:!1,DEV:!1,PROD:!0,MODE:"spa",API_URL:"http://lq.test:8080/api/v1",HOST:"localhost",PORT:"8080",AUTH_TOKEN_NAME:"lq-oauth",LANG_COOKIE_NAME:"lq-lang",COOKIE_DOMAIN:"lq.test",SECURE_COOKIE:"true",VUE_ROUTER_MODE:"history",VUE_ROUTER_BASE:"/quasar/",APP_URL:"undefined"}).MIX_APP_URL,console.log(this.app_url),this.userLoggued.role_id=1},mounted:function(){}},r=o,l=(a("6eaf"),a("2877")),c=Object(l["a"])(r,s,n,!1,null,"6fa65416",null);t["default"]=c.exports},8476:function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"row justify-left"},[a("div",{staticStyle:{width:"100%"}},[a("q-table",{attrs:{title:" ",data:e.data,columns:e.columns,"row-key":"id","binary-state-sort":"","card-container-style":{backgroundColor:"#ff0000"},dense:e.$q.screen.lt.md,loading:e.isLoading,pagination:e.pagination,"rows-per-page-options":[0]},scopedSlots:e._u([{key:"top",fn:function(){return[a("div",{staticClass:"col-4"},[a("q-input",{attrs:{"label-color":"orange-8",color:"orange-8",placeholder:"Buscar ..."},model:{value:e.filter,callback:function(t){e.filter=t},expression:"filter"}})],1),a("div",{staticClass:"col-4 text-center"},[a("q-btn",{staticClass:"q-ml-lg",attrs:{flat:"",dense:"","icon-right":"navigate_before",title:"Página anterior","no-caps":"",disable:0==e.page},on:{click:function(t){return e.getBases(e.page-1)}}}),a("q-btn",{staticClass:"q-px-sm ",attrs:{flat:"",dense:"",title:"Página atual","no-caps":""}},[e.isLoading?e._e():a("span",{attrs:{color:"orange"}},[e._v(e._s(e.page+1))]),e.isLoading?a("q-spinner-pie",{attrs:{color:"orange"}}):e._e()],1),a("q-btn",{attrs:{flat:"",dense:"","icon-right":"navigate_next",title:"Página seguinte","no-caps":"",disable:!e.hasMorePage},on:{click:function(t){return e.getBases(e.page+1)}}})],1),a("div",{staticClass:"col-4 text-right"},[a("q-btn",{attrs:{color:"orange-8","icon-right":"archive",label:"Exportar",title:"Exportar para CSV","no-caps":""},on:{click:e.exportTable}})],1)]},proxy:!0},{key:"body",fn:function(t){return[a("q-tr",{attrs:{props:t}},[a("q-td",{key:"origin_id",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n                "+e._s(t.row.origin_id)+"\n            ")]),a("q-td",{key:"company_id",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n                "+e._s(t.row.company_id)+"\n            ")]),a("q-td",{key:"criator_id",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n                "+e._s(t.row.criator_id)+"\n            ")]),a("q-td",{key:"name",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n              "+e._s(t.row.name)+"\n            ")]),a("q-td",{key:"decription",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n              "+e._s(t.row.decription)+"\n            ")]),a("q-td",{key:"created_at",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n              "+e._s(t.row.created_at.substr(0,10))+"\n            ")]),a("q-td",{key:"actions",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[a("div",{staticStyle:{"margin-left":"-3px"}},[a("q-icon",{staticClass:"pointer-hover q-mr-sm",attrs:{color:"primary",size:"sm",title:"Ver/Editar",name:"account_balance_wallet"},on:{click:function(a){return e.editBase(t.row)}}}),a("q-icon",{staticClass:"pointer-hover",attrs:{color:"red",size:"sm",name:"delete",title:"Eliminar"},on:{click:function(a){return e.confirmDeleteBase(t.row)}}})],1)])],1)]}},{key:"bottom",fn:function(){return[a("div",{staticClass:"col-12 text-center q-mt-md"},[a("q-btn",{staticClass:"q-ml-lg",attrs:{flat:"",dense:"","icon-right":"navigate_before",title:"Página anterior","no-caps":"",disable:0==e.page},on:{click:function(t){return e.getBases(e.page-1)}}}),a("q-btn",{staticClass:"q-px-sm ",attrs:{flat:"",dense:"",title:"Página atual","no-caps":""}},[e._v("\n            "+e._s(e.page+1)+"\n          ")]),a("q-btn",{attrs:{flat:"",dense:"","icon-right":"navigate_next",title:"Página seguinte","no-caps":"",disable:!e.hasMorePage},on:{click:function(t){return e.getBases(e.page+1)}}})],1)]},proxy:!0},{key:"pagination",fn:function(){},proxy:!0},{key:"no-data",fn:function(t){var s=t.icon,n=(t.message,t.filter);return[a("div",{staticClass:"full-width row flex-center text-accent q-gutter-sm"},[a("q-icon",{attrs:{size:"2em",name:"sentiment_dissatisfied"}}),a("span",[e._v("\n            Não existem dados para mostrar...\n          ")]),a("q-icon",{attrs:{size:"2em",name:n?"filter_b_and_w":s}})],1)]}}])}),a("q-dialog",{attrs:{persistent:"","transition-show":"flip-down","transition-hide":"flip-up"},model:{value:e.modalConfirmDelete,callback:function(t){e.modalConfirmDelete=t},expression:"modalConfirmDelete"}},[a("q-card",[a("q-card-section",{staticClass:"row items-center"},[a("q-icon",{staticClass:"text-red",staticStyle:{"font-size":"1.9rem"},attrs:{name:"warning"}}),e.base?a("span",{staticClass:"q-ml-sm"},[e._v('Confirma que deseja eliminar a base "'+e._s(e.base.name)+'"?')]):e._e()],1),a("q-card-section",{directives:[{name:"show",rawName:"v-show",value:e.isDeleting,expression:"isDeleting"}],staticClass:"text-center"},[a("q-spinner-ios",{attrs:{color:"orange-8",size:"1.9rem"}})],1),a("q-card-actions",{attrs:{align:"right"}},[a("q-btn",{attrs:{flat:"",label:"Eliminar",color:"orange-8"},on:{click:function(t){return t.preventDefault(),e.deleteBase(t)}}}),a("q-btn",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{flat:"",label:"Cancelar",color:"gray"}})],1)],1)],1)],1)])},n=[],i=(a("7f7f"),a("ac6a"),a("cadf"),a("06db"),a("8615"),a("28a5"),a("2034")),o=a("b178");function r(e,t){var a=void 0!==t?t(e):e;return a=void 0===a||null===a?"":String(a),a=a.split('"').join('""'),'"'.concat(a,'"')}var l={name:"TableBases",props:{},components:{},data:function(){return{action:"",base:null,data:[],columns:[{label:"Origem",field:"origin_id",name:"origin_id",required:!0,align:"left",format:function(e){return"".concat(e)},sortable:!0},{label:"Empresa",field:"company_id",name:"company_id",align:"center"},{label:"Criador",field:"criator_id",name:"criator_id",align:"center"},{label:"Nome",field:"name",name:"name",align:"center"},{label:"Descrição",field:"decription",name:"decription",align:"center"},{label:"Criação",field:"created_at",name:"created_at",align:"center"},{label:"Ações",field:"actions",name:"actions",align:"center"}],filter:"",isLoading:!1,page:0,hasMorePage:!1,strFilter:0,pagination:{rowsPerPage:0},modalConfirmDelete:!1,isDeleting:!1}},methods:{getBases:function(e){var t=this;this.isLoading=!0,i["a"].get("web/bases",{filter:this.filter,page:e}).then((function(a){var s=Object.values(a.data);t.data=s,t.page=e,t.hasMorePage=s.length})).catch((function(e){})).then((function(){t.isLoading=!1}))},editBase:function(e){this.$emit("editBase",e)},deleteBase:function(){var e=this;this.base&&(this.isDeleting=!0,i["a"].delete("web/bases/"+this.base.id).then((function(t){e.modalConfirmDelete=!1,e.$q.notify({type:"positive",message:"Base eliminada com sucesso.",position:"top-right"}),e.getBases(e.page)})).catch((function(e){})).then((function(){e.isDeleting=!1})))},confirmDeleteBase:function(e){this.base=e,this.modalConfirmDelete=!0},exportTable:function(){var e=this,t=[this.columns.map((function(e){return r(e.label)}))].concat(this.data.map((function(t){return e.columns.map((function(e){return r("function"===typeof e.field?e.field(t):t[void 0===e.field?e.name:e.field],e.format)})).join(",")}))).join("\r\n"),a=Object(o["h"])("table-export.csv",t,"text/csv");!0!==a&&this.$q.notify({message:"Download do arquivo negado pelo navegador...",color:"negative",icon:"warning"})}},watch:{filter:function(e){this.getBases(0)}},beforeMount:function(){this.getBases(0)}},c=l,d=(a("6001"),a("2877")),p=Object(d["a"])(c,s,n,!1,null,"b9b2e40a",null);t["default"]=p.exports},"8a98":function(e,t,a){},a4e5:function(e,t,a){},ab9b:function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("q-page",{staticClass:"bg-gray q-pa-md"},[a("div",{staticClass:"flex justify-between"},[a("h6",[e._v("Bases")])]),a("q-card",{attrs:{"no-bordered":"",flat:""}},[a("q-tabs",{staticClass:"text-grey",attrs:{dense:"","active-color":"orange-10","indicator-color":"orange-10",align:"left",caps:"","inline-label":""},model:{value:e.tab,callback:function(t){e.tab=t},expression:"tab"}},[a("q-tab",{staticClass:"text-dark",attrs:{name:"showBases",icon:"horizontal_split",label:"Bases"},on:{click:e.showTabBases}}),a("q-tab",{staticClass:"text-dark",attrs:{name:"crudBases",icon:e.iconActionBases,label:e.crudTabTitle}})],1),a("q-separator"),a("q-tab-panels",{attrs:{animated:""},model:{value:e.tab,callback:function(t){e.tab=t},expression:"tab"}},[a("q-tab-panel",{staticClass:"q-pa-none",attrs:{name:"showBases"}},[a("TableBases",{on:{editBase:e.editBase}})],1),a("q-tab-panel",{attrs:{name:"crudBases"}},[a("CrudBases",{attrs:{action:e.action,base:e.base},on:{reloadBases:e.reloadBases}})],1)],1)],1)],1)},n=[],i=(a("a481"),a("f751"),{name:"Bases",components:{CrudBases:a("79eb").default,TableBases:a("8476").default},data:function(){return{tab:"",base:{},crudTabTitle:"",action:"",iconActionBases:""}},methods:{showTabBases:function(){this.base={},this.crudTabTitle="Nova base",this.action="insert",this.iconActionBases="add",this.tab="showBases"},editBase:function(e){this.base=Object.assign({},e),this.crudTabTitle="Editar base",this.action="edit",this.iconActionCompany="edit",this.tab="crudBases"},reloadBases:function(){this.showTabBases()}},watch:{},computed:{},beforeMount:function(){this.showTabBases()},created:function(){},destroyed:function(){},beforeRouteEnter:function(e,t,a){a((function(e){e.isAuth&&e.$router.replace({name:"public.index"})}))},meta:function(){return{title:"Bases"}}}),o=i,r=(a("b750"),a("2877")),l=Object(r["a"])(o,s,n,!1,null,"7ba289dc",null);t["default"]=l.exports},b750:function(e,t,a){"use strict";var s=a("d5d7"),n=a.n(s);n.a},d5d7:function(e,t,a){}}]);