(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[3],{"51f7":function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("q-page",{staticClass:"bg-gray q-pa-md"},[a("div",{staticClass:"flex justify-between"},[a("h6",[e._v("Campanhas")])]),a("q-card",{attrs:{"no-bordered":"",flat:""}},[a("q-tabs",{staticClass:"text-grey",attrs:{dense:"","active-color":"orange-10","indicator-color":"orange-10",align:"left",caps:"","inline-label":""},model:{value:e.tab,callback:function(t){e.tab=t},expression:"tab"}},[a("q-tab",{staticClass:"text-dark",attrs:{name:"campaigns",icon:"horizontal_split",label:"Campanhas"},on:{click:function(e){}}}),a("q-tab",{staticClass:"text-dark",attrs:{name:"crudCampaigns",icon:"add",label:"Nova campanha"}})],1),a("q-separator"),a("q-tab-panels",{attrs:{animated:""},model:{value:e.tab,callback:function(t){e.tab=t},expression:"tab"}},[a("q-tab-panel",{staticClass:"q-pa-none",attrs:{name:"campaigns"}},[a("TableCampaigns",{attrs:{campaigns:e.allCampaigns},on:{edit:e.editCampaign,delete:e.deleteCampaign,reload:e.reloadCampaigns}})],1),a("q-tab-panel",{attrs:{name:"crudCampaigns"}},[a("CrudCampaigns",{attrs:{action:"insert",campaignItem:{}}})],1)],1)],1)],1)},n=[],i=(a("a481"),a("f751"),{plane_id:3,criator_id:1,updater_id:2,created_at:"2020-01-08 13:10:58",updated_at:"2020-01-04 10:51:58",name:"Impato do coronavírus na economia",description:"Questionario para avaliar o posível impato do coronavirus na economia mundial dirigido a insestidores e economistas do mercado Forex",observation:"Esse questionário deve ser aplicado em quatro campanhas diferentes para avaliar as mudanças nas respostas dos targets",released:0,pages:[{id:1,type_id:1,question:"Você já ouviu falar do coronavirus?",json_data:null,responseOptions:[]},{id:2,type_id:1,question:"O coranavirus contagia somente animais?",json_data:null,responseOptions:[]},{id:3,type_id:2,question:"Selecione a opção correta relacionada com a organização biológica do coronavirus",json_data:null,responseOptions:[{id:1,question_id:3,response:"Coronavirus é uma molécula",is_truth:!1},{id:2,question_id:3,response:"Coronavirus é uma bactéria",is_truth:!1},{id:2,question_id:3,response:"Coronavirus é uma gripezinha",is_truth:!1},{id:3,question_id:3,response:"Coronavirus é um virus",is_truth:!0},{id:4,question_id:3,response:"Coronavirus é um organismo pluricelular",is_truth:!1}]},{id:4,type_id:3,question:"Selecione as opções corretas sobre o impato do coronavirus",json_data:"",responseOptions:[{id:5,question_id:4,response:"Coronavirus somente contagia idosos",is_truth:!1},{id:6,question_id:4,response:"Coronavirus é uma pandemia de alta prioridade somente para China",is_truth:!1},{id:7,question_id:4,response:"Coronavirus é uma preocupação para todos os países do mundo",is_truth:!0},{id:8,question_id:4,response:"Coronavirus vai provocar uma grande recessão económica mundial",is_truth:!0},{id:9,question_id:4,response:"Coronavirus somente afeta a países desenvolvidos",is_truth:!1}]},{id:5,type_id:2,question:"Analise a seguinte imagem e escolha a opção que você acha que representa",json_data:{type:"image",ClientOriginalExtension:"jpg",src:"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS3Ko2lxKDMsaiySiQlZO_iopwktOlDrVB3574DS44SLLcGqBRV"},responseOptions:[{id:10,question_id:5,response:"Uma molécula de agua",is_truth:!1},{id:11,question_id:5,response:"Um eletron",is_truth:!1},{id:12,question_id:5,response:"Uma gripezinha",is_truth:!1},{id:13,question_id:5,response:"O Coronavirus",is_truth:!0},{id:14,question_id:5,response:"Um sorvete com cabelo black",is_truth:!1}]},{id:6,type_id:4,question:"Avalie do 1 até o 10 a atitude dos governadores estaduais brasileiro enquanto a medida de isolamento social adotadas para prevenir a expensão do coronavirus, onde 1 é RUIM e 10 é ECXELENTE",json_data:null,responseOptions:[{id:15,question_id:6,response:"1",is_truth:!0},{id:16,question_id:6,response:"10",is_truth:!0}]},{id:7,type_id:5,question:"Analise o seguinte video e discurse sobre o que você entendeu",json_data:{type:"video",ClientOriginalExtension:"mp4",src:"https://www.youtube.com/watch?v=hfkDdD_rFj8"},responseOptions:null}]}),o={id:1,status_id:1,criator_id:1,updater_id:1,questionary_id:1,base_id:1,name:"Influência do coronavirus",objetive:"",description:"",observation:"",response_limit:50,response_amount:23,invitations_sent:100,invitations_accepted:80,invitations_declined:13,requested_date:"2020-10-10 10:10",analyzed_date:"2020-10-10 10:10",start_date:"2020-10-20 10:10",end_date:"2020-10-25 10:10",created_at:"2020-10-10 10:10",updated_at:"2020-10-10 10:10",questionaries:[i]},r={name:"Questionaries",components:{CrudCampaigns:a("823c").default,TableCampaigns:a("aa3c").default},data:function(){return{tab:"questionaries",showCrudCampaign:!1,campaignModel:null,allCampaigns:[],loader:!1}},methods:{getCampaigns:function(){this.tab="campaigns",this.allCampaigns=[],this.allCampaigns.push(Object.assign({},o)),this.allCampaigns.push(Object.assign({},o)),this.allCampaigns.push(Object.assign({},o))},editCampaign:function(){},deleteCampaign:function(){},reloadCampaigns:function(){}},watch:{},computed:{},beforeMount:function(){this.showCrudCampaign=!1,this.getCampaigns()},created:function(){},destroyed:function(){},beforeRouteEnter:function(e,t,a){a((function(e){e.isAuth&&e.$router.replace({name:"public.index"})}))},meta:function(){return{title:"Campanhas"}}},l=r,c=(a("e2f6"),a("2877")),d=Object(c["a"])(l,s,n,!1,null,"1dbed63e",null);t["default"]=d.exports},"823c":function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"row justify-left"},[a("q-banner",{staticClass:"bg-cyan-2  flex justify-between"},[e._v("\n      Plano "),a("b",[e._v(e._s(e.plane.name))]),e._v(" selecionado.\n      "),a("q-btn",{attrs:{flat:"",color:"primary",label:"Trocar plano"},on:{click:function(t){return t.preventDefault(),e.emitQuestionaryChangePlane(t)}}})],1),e._m(0),a("q-separator",{staticClass:"col-12 q-pa-none q-ma-none"}),a("div",{staticClass:"col-12 q-mt-lg"},[a("b",[e._v("Título do questionário")]),a("q-input",{staticClass:"col-12 q-mt-sm",attrs:{filled:"",square:"","label-color":"orange-8",color:"orange-8"},model:{value:e.questionary.name,callback:function(t){e.$set(e.questionary,"name",t)},expression:"questionary.name"}})],1),a("div",{staticClass:"col-12 q-mt-lg"},[a("b",[e._v("Introdução/Descrição")]),a("q-input",{staticClass:"col-12 q-mt-sm",attrs:{filled:"",square:"",autogrow:"","label-color":"orange-8",color:"orange-8"},model:{value:e.questionary.description,callback:function(t){e.$set(e.questionary,"description",t)},expression:"questionary.description"}})],1),a("div",{staticClass:"col-12 flex q-mt-xl justify-between"},[a("span",{staticClass:"q-mt-sm",staticStyle:{"font-size":"1.2rem"}},[e._v("Páginas")]),a("div",[a("q-btn",{staticClass:"q-pa-sm q-mb-sm",attrs:{"text-color":"orange-8",flat:"",dense:"",title:"Criar nova página",icon:"note_add",label:"Nova página"},on:{click:function(t){return t.preventDefault(),e.showCriateNewPage(t)}}}),a("q-btn",{staticClass:"q-pa-sm q-mb-sm",attrs:{"text-color":"orange-8",flat:"",dense:"",title:"Condicionar páginas",icon:"account_tree",label:"Condições"},on:{click:function(t){return t.preventDefault(),e.showConditionsTab(t)}}})],1)]),a("q-separator",{staticClass:"col-12 q-pa-none q-ma-none"}),a("div",{staticClass:"col-xs-12 col-sm-4 col-md-4 col-lg-4 col-md-3 q-mt-lg justify-center"},[a("q-list",{attrs:{bordered:""}},[a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"bg-orange-8",staticStyle:{color:"white"},attrs:{clickable:""},on:{click:function(t){e.showPainelPageList=!e.showPainelPageList}}},[a("q-item-section",[a("b",{staticStyle:{"font-size":"1rem"}},[e._v("Páginas criadas")])]),a("q-item-section",{attrs:{avatar:""}},[a("i",{class:[{"fas fa-chevron-up":!0===e.showPainelPageList},{"fas fa-chevron-down":!1===e.showPainelPageList}]})])],1),a("div",{directives:[{name:"show",rawName:"v-show",value:e.showPainelPageList,expression:"showPainelPageList"}]},e._l(e.questionary.pages,(function(t,s){return a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],key:s,attrs:{clickable:""},on:{click:function(t){return t.preventDefault(),e.showSelectedPage(s)}}},[a("q-item-section",[a("span",{staticStyle:{"font-size":"0.95rem"}},[e._v("Página "+e._s(s+1))])]),a("q-item-section",{attrs:{avatar:""}},[a("div",[a("q-btn",{staticClass:"q-pa-sm",attrs:{"text-color":"red",flat:"",dense:"",round:"",title:"Eliminar página",icon:"delete"},on:{click:function(t){return t.preventDefault(),e.deleteSelectedPage(s)}}})],1)])],1)})),1)],1)],1),a("div",{staticClass:"col-1"}),a("div",{staticClass:"col-xs-12 col-sm-7 col-md-7 col-lg-7 col-md-6 q-mt-lg"},[e.questionary.pages&&e.questionary.pages.length>0?a("div",[a("q-separator",{staticClass:"col-12 q-ma-none",staticStyle:{"padding-top":"2px"},attrs:{color:"orange-8"}}),a("div",{staticClass:"q-py-md"},[a("q-card",{attrs:{flat:""}},[a("q-tab-panels",{attrs:{animated:"",dense:"","active-color":"orange-10","indicator-color":"orange-10",align:"left",caps:"","inline-label":""},model:{value:e.tab,callback:function(t){e.tab=t},expression:"tab"}},[a("q-tab-panel",{staticClass:"q-pa-none",attrs:{name:"contentTab"}},[e.selectedPageIndex>-1||e.isCreatingNewPage?a("div",[e.isCreatingNewPage?a("span",{staticClass:"q-py-md",staticStyle:{"font-size":"1.3rem"}},[e._v("Página nova")]):e._e(),!e.isCreatingNewPage&&e.selectedPageIndex>-1?a("span",{staticClass:"q-py-md",staticStyle:{"font-size":"1.3rem"}},[e._v("Página "+e._s(e.selectedPageIndex+1))]):e._e(),3===e.plane.code?a("div",[null===e.questionary.pages[e.selectedPageIndex].json_data||""===e.questionary.pages[e.selectedPageIndex].json_data?a("div",{staticClass:"flex justify-between q-pt-md"},[a("b",{staticClass:"q-pt-md"},[e._v("Nenhuma mídia adicionada")]),a("div",[a("q-btn",{staticClass:"q-pa-sm",attrs:{"text-color":"orange-8",flat:"",dense:"",title:"Adicionar mídia a essa página",label:"Adicionar mídia",icon:"add_circle"},on:{click:function(t){t.preventDefault(),e.isAddingMidia=!e.isAddingMidia}}})],1)]):a("div",{staticClass:"flex justify-between q-pt-md"},["image"===e.questionary.pages[e.selectedPageIndex].json_data.type?a("b",{staticClass:"q-pt-md"},[e._v("Mídia: Imagen")]):e._e(),"video"===e.questionary.pages[e.selectedPageIndex].json_data.type?a("b",{staticClass:"q-pt-md"},[e._v("Mídia: Video")]):e._e(),a("div",[a("q-btn",{staticClass:"q-pa-sm",attrs:{"text-color":"green",size:"md",flat:"",dense:"",round:"",title:"Editar mídia",icon:"edit"},on:{click:function(t){t.preventDefault(),e.isEditingMidia=!e.isEditingMidia}}}),a("q-btn",{staticClass:"q-pa-sm",attrs:{"text-color":"red",flat:"",dense:"",round:"",title:"Eliminar mídia",icon:"delete"},on:{click:e.deleteMidia}})],1)]),e.isEditingMidia||e.isAddingMidia?a("div",[a("span",{staticClass:"q-pt-md"},[e._v("Insira a URL da mídia ou Suba um arquivo")]),a("div",{staticClass:"flex justify-between q-col-8 q-pt-xs"},[a("q-input",{staticClass:"q-col-8",staticStyle:{width:"100%"},attrs:{filled:"",square:"",label:"URL da mídia online","label-color":"orange-8",color:"orange-8"},scopedSlots:e._u([{key:"after",fn:function(){return[a("q-btn",{staticClass:"q-py-sm",attrs:{color:"orange-8"},on:{click:e.triggerUploadMidia}},[a("i",{staticClass:"fas fa-upload",staticStyle:{"font-size":"1.3rem",padding:"0.1rem"},attrs:{title:"Selecionar arquivo a subir"}})])]},proxy:!0}],null,!1,3412042663),model:{value:e.questionary.json_data,callback:function(t){e.$set(e.questionary,"json_data",t)},expression:"questionary.json_data"}}),a("input",{ref:"fileInputMidia",staticStyle:{display:"none"},attrs:{id:"fileInputAudio",type:"file",accept:"image/*, video/*"},on:{change:function(t){return t.preventDefault(),e.handleFileUploadContent(t)}}})],1)]):e._e(),a("div",{staticClass:"q-pa-md bg-grey-3 q-mt-sm"},[a("div",{staticClass:"q-col-gutter-md row items-start"},[a("div",{staticClass:"col-7 justify-center"},[null===e.questionary.pages[e.selectedPageIndex].json_data||""===e.questionary.pages[e.selectedPageIndex].json_data?a("div",{staticStyle:{"padding-bottom":"8rem"}},[e._v("Nenhuma mídia adicionada")]):"image"===e.questionary.pages[e.selectedPageIndex].json_data.type?a("q-img",{attrs:{src:e.questionary.pages[e.selectedPageIndex].json_data.src,ratio:16/9}}):"video"===e.questionary.pages[e.selectedPageIndex].json_data.type?a("q-video",{attrs:{ratio:16/9,src:"https://www.youtube.com/embed/k3_tw44QsZQ?rel=0"}}):e._e()],1)])])]):e._e(),a("q-separator",{staticClass:"q-mt-lg",staticStyle:{"padding-top":"2px"},attrs:{color:"orange-8"}}),a("div",{staticClass:"q-pt-md"},[a("b",[e._v("Pergunta")]),a("q-input",{staticClass:"col-12 q-mt-sm",attrs:{filled:"",square:"",autogrow:"","label-color":"orange-8",color:"orange-8"},model:{value:e.questionary.pages[e.selectedPageIndex].question,callback:function(t){e.$set(e.questionary.pages[e.selectedPageIndex],"question",t)},expression:"questionary.pages[selectedPageIndex].question"}})],1),a("div",{staticClass:"q-pt-md"},[a("b",[e._v("Tipo de resposta")]),a("q-select",{staticClass:"q-mt-sm",attrs:{filled:"",square:"",options:e.pageOptions,"option-value":"id","label-color":"orange-8","option-label":"desc","option-disable":"inactive","emit-value":"","map-options":"",color:"orange-8"},on:{input:e.configureResponseOptions},model:{value:e.questionary.pages[e.selectedPageIndex].type_id,callback:function(t){e.$set(e.questionary.pages[e.selectedPageIndex],"type_id",t)},expression:"questionary.pages[selectedPageIndex].type_id"}})],1),[2,3].includes(e.questionary.pages[e.selectedPageIndex].type_id)?a("div",[a("div",{staticClass:"flex justify-between q-pt-sm"},[a("b",{staticClass:"q-pt-md"},[e._v("Opções de resposta")]),a("div",[a("q-btn",{staticClass:"q-pa-sm",attrs:{"text-color":"orange-8",flat:"",dense:"",title:"Criar opção de resposta",label:"Adicionar resposta",icon:"add_circle"},on:{click:function(t){t.preventDefault(),e.isAddingResponseOption=!e.isAddingResponseOption}}})],1)]),a("div",{staticClass:"flex justify-between q-col-8 q-pt-xs"},[e._l(e.questionary.pages[e.selectedPageIndex].responseOptions,(function(t,s){return a("div",{key:s,staticStyle:{width:"100%"}},[a("q-input",{attrs:{filled:"",square:"",autogrow:"",label:" ","label-color":"orange-8",color:"orange-8"},scopedSlots:e._u([{key:"prepend",fn:function(){return[a("div",[a("span",{staticStyle:{"font-size":"1rem"}},[e._v(e._s(s+1)+". ")]),a("q-checkbox",{attrs:{dense:"",flat:"",title:t.is_truth?"Opção verdadeira":"Opção falsa",color:"primary"},on:{input:function(a){2===e.questionary.pages[e.selectedPageIndex].type_id&&t.is_truth&&e.checkOnlyOption(s,1)}},model:{value:t.is_truth,callback:function(a){e.$set(t,"is_truth",a)},expression:"option.is_truth"}})],1)]},proxy:!0},{key:"append",fn:function(){return[a("q-btn",{staticClass:"q-pa-sm",attrs:{flat:"",dense:"",rounded:"",color:"grey-3","text-color":"red",icon:"delete"},on:{click:function(t){return e.deleteResponseOption(s)}}})]},proxy:!0}],null,!0),model:{value:t.response,callback:function(a){e.$set(t,"response",a)},expression:"option.response"}}),a("q-separator")],1)})),0===e.questionary.pages[e.selectedPageIndex].responseOptions.length?a("div",{staticClass:"q-pa-md bg-grey-3 q-mb-md",staticStyle:{width:"100%"}},[a("span",{staticStyle:{"font-size":"0.9rem"}},[e._v("Nenhuma opção de resposta criada")])]):e._e()],2),e.isAddingResponseOption?a("div",[a("div",{staticClass:"flex justify-between q-col-8 q-pt-sm"},[a("q-input",{staticStyle:{width:"100%"},attrs:{filled:"",square:"",label:" ","label-color":"orange-8",color:"orange-8"},on:{keydown:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:(t.preventDefault(),e.addResponseOption(t))}},scopedSlots:e._u([{key:"prepend",fn:function(){return[a("q-checkbox",{attrs:{title:"Marcar somente se essa opção é verdadeira",dense:"",color:"primary"},on:{input:function(t){e.newResponseOption.is_truth&&e.checkOnlyOption(0,0)}},model:{value:e.newResponseOption.is_truth,callback:function(t){e.$set(e.newResponseOption,"is_truth",t)},expression:"newResponseOption.is_truth"}})]},proxy:!0},{key:"after",fn:function(){return[a("q-btn",{staticClass:"q-py-sm",attrs:{color:"orange-8",title:"Adicionar opção de resposta"},on:{click:function(t){return t.preventDefault(),e.addResponseOption(t)}}},[a("i",{staticClass:"fas fa-check-circle",staticStyle:{"font-size":"1.3rem",padding:"0.1rem"}})])]},proxy:!0}],null,!1,4012802154),model:{value:e.newResponseOption.response,callback:function(t){e.$set(e.newResponseOption,"response",t)},expression:"newResponseOption.response"}})],1)]):e._e()]):e._e(),[4].includes(e.questionary.pages[e.selectedPageIndex].type_id)?a("div",[a("div",{staticClass:"flex justify-between q-pt-sm"},[a("b",{staticClass:"q-pt-md"},[e._v(e._s("insert"===e.action?"Estabelecer escala":"Escala estabelecida"))]),"insert"===e.action?a("div",[a("q-btn",{staticClass:"q-pa-sm",attrs:{"text-color":"blue",flat:"",dense:"",round:"",title:"Criar opção de resposta",icon:"add_circle"},on:{click:function(t){t.preventDefault(),e.isAddingResponseOption=!e.isAddingResponseOption}}})],1):e._e()]),a("div",{staticClass:"flex justify-between align-bottom align-items-end"},[a("div",{},[a("span",{staticStyle:{"font-size":"0.9rem"}},[e._v(" Limite inferior")]),a("q-input",{attrs:{filled:"",square:"",label:" ","label-color":"orange-8",color:"orange-8"},scopedSlots:e._u([{key:"prepend",fn:function(){return[a("q-icon",{attrs:{name:"vertical_align_bottom"}})]},proxy:!0}],null,!1,455553148),model:{value:e.questionary.pages[e.selectedPageIndex].responseOptions[0].response,callback:function(t){e.$set(e.questionary.pages[e.selectedPageIndex].responseOptions[0],"response",t)},expression:"questionary.pages[selectedPageIndex].responseOptions[0].response"}})],1),a("div",{},[a("span",{staticStyle:{"font-size":"0.9rem"}},[e._v(" Limite superior")]),a("q-input",{attrs:{filled:"",square:"",label:" ","label-color":"orange-8",color:"orange-8"},scopedSlots:e._u([{key:"prepend",fn:function(){return[a("q-icon",{attrs:{name:"vertical_align_top"}})]},proxy:!0}],null,!1,3314577240),model:{value:e.questionary.pages[e.selectedPageIndex].responseOptions[1].response,callback:function(t){e.$set(e.questionary.pages[e.selectedPageIndex].responseOptions[1],"response",t)},expression:"questionary.pages[selectedPageIndex].responseOptions[1].response"}})],1),a("div",{},[a("q-btn",{staticClass:"q-py-sm q-mt-lg",attrs:{color:"orange-8",title:"insert"===e.action?"Adicionar escala":"Atualizar escala"},on:{click:function(t){return t.preventDefault(),e.addResponseOption(t)}}},[a("i",{staticClass:"fas fa-check-circle",staticStyle:{"font-size":"1.3rem",padding:"0.1rem"}})])],1)])]):e._e()],1):e._e()]),a("q-tab-panel",{staticClass:"q-pa-none",attrs:{name:"conditionsTab"}},[a("div",{staticClass:"text-h6"},[e._v("Condição")]),e._v("\n                          Lorem ipsum dolor sit amet consectetur adipisicing elit. "),a("br"),e._v("\n                          Lorem ipsum dolor sit amet consectetur adipisicing elit. "),a("br"),e._v("\n                          Lorem ipsum dolor sit amet consectetur adipisicing elit. "),a("br"),e._v("\n                          Lorem ipsum dolor sit amet consectetur adipisicing elit. "),a("br"),e._v("\n                          Lorem ipsum dolor sit amet consectetur adipisicing elit. "),a("br")])],1)],1)],1)],1):e._e()]),a("div",{staticClass:"col-12 flex q-my-md justify-between"},[a("span",{staticClass:"q-mt-sm",staticStyle:{"font-size":"1.2rem"}},[e._v("Finalizar "+e._s("insert"===e.action?"criação":"edição")+" do  questionário")])]),a("q-separator",{staticClass:"col-12 q-pa-none q-ma-none"}),a("div",{staticClass:"q-my-md"},[a("q-btn",{staticClass:"q-pa-sm q-mb-sm bg-orange-8",attrs:{"text-color":"white",label:"Guardar questionário",title:"Guardar questionário",icon:"save"},on:{click:function(t){return t.preventDefault(),e.showCriateNewPage(t)}}})],1)],1)},n=[function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"col-12 flex q-my-md justify-between"},[a("span",{staticClass:"q-mt-sm",staticStyle:{"font-size":"1.2rem"}},[e._v("Questionário")])])}],i=(a("6762"),a("2fdb"),a("f751"),{name:"CrudQuestionary",props:{plane:null,action:null,questionaryItem:null},data:function(){return{questionary:{plane_id:0,criator_id:0,updater_id:0,name:"",description:"",observation:"",released:0,pages:null},editPage:null,newPage:{id:0,type_id:0,question:"",json_data:null},responseOptions:[],newResponseOptionScale:[{id:0,question_id:0,response:"",is_truth:!0},{id:0,question_id:0,response:"",is_truth:!0}],newResponseOption:{id:0,question_id:0,response:"",is_truth:!1},pageOptions:[{id:1,desc:"Resposta com seleção Sim ou Não"},{id:2,desc:"Resposta com seleção única"},{id:3,desc:"Resposta com múltipla escolha"},{id:4,desc:"Resposta em escala"},{id:5,desc:"Resposta em texto livre"}],imageExtensions:[".jpeg",".jpg",".pgn",".bmp",".gif",".svg"],videoExtensions:[".ogg",".mkv",".webm",".ogv",".vob",".drc",".avi",".mov",".wmv",".yuv",".rmvb",".amv",".m4p",".mp4",".mpg",".mpeg",".mpe",".mpv",".m2v",".m4v",".3gp"],isCreatingNewPage:!1,isEditingMidia:!1,isAddingMidia:!1,isAddingResponseOption:!1,selectedPageIndex:-1,showPainelPageList:!1,tab:"contentTab"}},methods:{emitQuestionaryChangePlane:function(){this.$emit("onchangeplane")},showCriateNewPage:function(){this.tab="contentTab",this.isCreatingNewPage=!0},showSelectedPage:function(e){this.isCreatingNewPage=!1,this.selectedPageIndex=e,this.tab="contentTab"},deleteSelectedPage:function(e){this.$q.dialog({title:"Verificação",message:"Confirma que deseja eliminar a Página "+(e+1)+"?",cancel:"Cancelar",ok:"Confirmar",persistent:!0}).onOk((function(){console.log(">>>> OK")})).onOk((function(){console.log(">>>> second OK catcher")})).onCancel((function(){console.log(">>>> Cancel")})).onDismiss((function(){console.log("I am triggered on both OK and Cancel")}))},deleteMidia:function(){this.$q.dialog({title:"Verificação",message:"Confirma que deseja eliminar essa mídia?",cancel:"Cancelar",ok:"Confirmar",persistent:!0}).onOk((function(){console.log(">>>> OK")})).onOk((function(){console.log(">>>> second OK catcher")})).onCancel((function(){console.log(">>>> Cancel")})).onDismiss((function(){console.log("I am triggered on both OK and Cancel")}))},triggerUploadMidia:function(){this.$refs.fileInputMidia.click()},configureResponseOptions:function(){},checkOnlyOption:function(e,t){2===this.questionary.pages[this.selectedPageIndex].type_id&&(this.questionary.pages[this.selectedPageIndex].responseOptions.some((function(e,t){e.is_truth=!1})),t?(this.questionary.pages[this.selectedPageIndex].responseOptions[e].is_truth=!0,this.newResponseOption.is_truth=!1):this.newResponseOption.is_truth=!0)},addResponseOption:function(){""!==this.newResponseOption.response.trim()&&(this.questionary.pages[this.selectedPageIndex].responseOptions.push(Object.assign({},this.newResponseOption)),this.newResponseOption.response="",this.newResponseOption.is_truth=!1)},deleteResponseOption:function(e){var t=this;this.$q.dialog({title:"Verificação",message:"Confirma que deseja eliminar essa opção de resposta?",cancel:"Cancelar",ok:"Confirmar",persistent:!0}).onOk((function(){t.responseOptions.splice(e,1),console.log(t.responseOptions)})).onOk((function(){console.log(">>>> second OK catcher")})).onCancel((function(){console.log(">>>> Cancel")})).onDismiss((function(){console.log("I am triggered on both OK and Cancel")}))},showConditionsTab:function(){this.tab="conditionsTab"},isImage:function(e){return!!this.imageExtensions.some((function(t,a){if(e.includes(t))return!0}))},isVideo:function(e){return!!this.videoExtensions.some((function(t,a){if(e.includes(t))return!0}))},triggerPositive:function(){this.$q.notify({type:"positive",message:'This is a "positive" type notification.'})},triggerNegative:function(){this.$q.notify({type:"negative",message:'This is a "negative" type notification.'})},triggerWarning:function(){this.$q.notify({type:"warning",message:'This is a "warning" type notification.'})},triggerInfo:function(){this.$q.notify({type:"info",message:'This is a "info" type notification.'})}},watch:{},beforeMount:function(){"display"!==this.action&&"edit"!==this.action||(this.questionary=this.questionaryItem),this.questionary.pages&&this.questionary.pages.length?this.selectedPageIndex=0:this.selectedPageIndex=-1},mounted:function(){}}),o=i,r=(a("feed"),a("2877")),l=Object(r["a"])(o,s,n,!1,null,"2d07c482",null);t["default"]=l.exports},8412:function(e,t,a){"use strict";var s=a("95a2"),n=a.n(s);n.a},"95a2":function(e,t,a){},9918:function(e,t,a){},aa3c:function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"row justify-left"},[a("div",{staticStyle:{width:"100%"}},[a("q-table",{attrs:{title:" ",data:e.data,columns:e.columns,"row-key":"id","binary-state-sort":"","card-container-style":{backgroundColor:"#ff0000"}},scopedSlots:e._u([{key:"body",fn:function(t){return[a("q-tr",{attrs:{props:t}},[a("q-td",{key:"name",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n                "+e._s(t.row.name)+"\n            ")]),a("q-td",{key:"response_limit",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[a("span",{attrs:{title:"Quantidade"}},[e._v(" "+e._s(t.row.response_amount)+" / ")]),a("span",{attrs:{title:"Limite"}},[e._v(" "+e._s(t.row.response_limit)+" ")])]),a("q-td",{key:"invitations_sent",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[a("span",{staticStyle:{color:"green !important"},attrs:{title:"Aceitos"}},[e._v(" "+e._s(t.row.invitations_accepted))]),e._v(" /\n              "),a("span",{staticStyle:{color:"red !important"},attrs:{title:"Rejeitados"}},[e._v(" "+e._s(t.row.invitations_declined))]),e._v(" /\n              "),a("span",{attrs:{title:"Enviados"}},[e._v(" "+e._s(t.row.invitations_sent))])]),a("q-td",{key:"requested_date",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n              "+e._s(t.row.requested_date.substr(0,10))+"\n            ")]),a("q-td",{key:"analyzed_date",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n              "+e._s(t.row.analyzed_date.substr(0,10))+"\n            ")]),a("q-td",{key:"start_date",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n              "+e._s(t.row.start_date.substr(0,10))+"\n            ")]),a("q-td",{key:"end_date",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n              "+e._s(t.row.end_date.substr(0,10))+"\n            ")]),a("q-td",{key:"created_at",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[e._v("\n              "+e._s(t.row.created_at.substr(0,10))+"\n            ")]),a("q-td",{key:"actions",staticClass:"q-pa-none q-ma-none",attrs:{props:t}},[a("div",{staticStyle:{"margin-left":"-3px"}},[a("q-icon",{staticClass:"pointer-hover q-mr-sm",attrs:{color:"primary",size:"sm",title:"Ver/Editar",name:"account_balance_wallet"},on:{click:function(a){return e.showSelectedQuestionary(t.row)}}}),a("q-icon",{staticClass:"pointer-hover",attrs:{color:"red",size:"sm",name:"delete",title:"Eliminar"}})],1)])],1)]}}])})],1)])},n=[],i={name:"TableCompanies",props:{campaigns:null},components:{},data:function(){return{action:"",campaignItem:null,columns:[{label:"Nome",field:"name",name:"name",required:!0,align:"left",format:function(e){return"".concat(e)},sortable:!0},{label:"Respostas",field:"response_limit",name:"response_limit",align:"center"},{label:"Convites",field:"invitations_sent",name:"invitations_sent",align:"center"},{label:"Solicitado",field:"requested_date",name:"requested_date",align:"center"},{label:"Analizado",field:"analyzed_date",name:"analyzed_date",align:"center"},{label:"Início",field:"start_date",name:"start_date",align:"center"},{label:"Fim",field:"end_date",name:"end_date",align:"center"},{label:"Criado",field:"created_at",name:"created_at",align:"center"},{label:"Ações",field:"actions",name:"actions",align:"center"}],data:[]}},methods:{},beforeMount:function(){this.data=this.campaigns}},o=i,r=(a("8412"),a("2877")),l=Object(r["a"])(o,s,n,!1,null,"43f02c9c",null);t["default"]=l.exports},d97c:function(e,t,a){},e2f6:function(e,t,a){"use strict";var s=a("d97c"),n=a.n(s);n.a},feed:function(e,t,a){"use strict";var s=a("9918"),n=a.n(s);n.a}}]);