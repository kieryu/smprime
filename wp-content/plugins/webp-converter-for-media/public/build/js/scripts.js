!function(t){var e={};function r(n){if(e[n])return e[n].exports;var i=e[n]={i:n,l:!1,exports:{}};return t[n].call(i.exports,i,i.exports,r),i.l=!0,i.exports}r.m=t,r.c=e,r.d=function(t,e,n){r.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},r.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,e){if(1&e&&(t=r(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)r.d(n,i,function(e){return t[e]}.bind(null,i));return n},r.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="/",r(r.s=0)}([function(t,e,r){r(1),t.exports=r(2)},function(t,e,r){"use strict";function n(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}r.r(e);var i=function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.setVars()&&this.setEvents()}var e,r,i;return e=t,(r=[{key:"setVars",value:function(){if(this.buttonOpen=document.querySelector('[data-slug="webp-converter-for-media"] a[id="deactivate-webp-converter-for-media"'),this.modal=document.querySelector(".webpModal"),this.buttonOpen&&this.modal)return this.outer=this.modal.querySelector(".webpModal__outer"),this.form=this.outer.querySelector(".webpModal__form"),this.formOptions=this.form.querySelectorAll('[name="webpc_reason"]'),this.formComment=this.form.querySelector('[name="webpc_comment"]'),this.buttonSubmit=this.form.querySelector('button[type="submit"]'),this.buttonCancel=this.form.querySelector('button[type="button"]'),this.events={openModal:this.openModal.bind(this)},this.atts={optionPlaceholder:"data-placeholder"},!0}},{key:"setEvents",value:function(){var t=this;this.buttonOpen.addEventListener("click",this.events.openModal),this.buttonSubmit.addEventListener("click",this.submitForm.bind(this)),this.buttonCancel.addEventListener("click",this.cancelForm.bind(this)),this.outer.addEventListener("click",this.closeModal.bind(this)),this.form.addEventListener("click",(function(t){t.stopPropagation()}));for(var e=this.formOptions.length,r=function(e){t.formOptions[e].addEventListener("change",(function(){t.setCurrentOption(e)}))},n=0;n<e;n++)r(n)}},{key:"openModal",value:function(t){t.preventDefault(),this.buttonOpen.removeEventListener("click",this.events.openModal),this.modal.removeAttribute("hidden")}},{key:"closeModal",value:function(){this.modal.setAttribute("hidden","hidden")}},{key:"submitForm",value:function(t){var e=this;t.preventDefault(),this.closeModal(),setTimeout((function(){var t=new FormData(e.form),r=e.form.getAttribute("action"),n=new XMLHttpRequest;n.open("POST",r,!0),n.send(t),e.buttonOpen.click()}),0)}},{key:"cancelForm",value:function(t){var e=this;t.preventDefault(),this.closeModal(),setTimeout((function(){e.buttonOpen.click()}),0)}},{key:"setCurrentOption",value:function(t){this.formComment.value="";var e=this.formOptions[t].getAttribute(this.atts.optionPlaceholder);this.formComment.setAttribute("placeholder",e)}}])&&n(e.prototype,r),i&&n(e,i),t}();function s(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}var o=function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.setVars()&&this.setEvents()}var e,r,n;return e=t,(r=[{key:"setVars",value:function(){if(this.notice=document.querySelector(".notice[data-notice=webp-converter]"),this.notice)return this.settings={isHidden:!1,ajaxUrl:this.notice.getAttribute("data-url")},!0}},{key:"setEvents",value:function(){window.addEventListener("load",this.getButtons.bind(this))}},{key:"getButtons",value:function(){this.buttonClose=this.notice.querySelector(".notice-dismiss"),this.buttonPermanently=this.notice.querySelector("[data-permanently]"),this.setButtonsEvents()}},{key:"setButtonsEvents",value:function(){var t=this;this.buttonClose.addEventListener("click",(function(){t.hideNotice(!1)})),this.buttonPermanently.addEventListener("click",(function(e){e.preventDefault(),t.hideNotice(!0)}))}},{key:"hideNotice",value:function(t){this.settings.isHidden||(this.settings.isHidden=!0,jQuery.ajax(this.settings.ajaxUrl,{type:"POST",data:{action:"webpc_notice",is_permanently:t?1:0}}),this.buttonClose.click())}}])&&s(e.prototype,r),n&&s(e,n),t}();function a(t,e){for(var r=0;r<e.length;r++){var n=e[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}var u=function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.setVars()&&this.setEvents()}var e,r,n;return e=t,(r=[{key:"setVars",value:function(){if(this.section=document.querySelector(".webpLoader"),this.section)return this.wrapper=this.section.querySelector(".webpLoader__status"),this.progress=this.wrapper.querySelector(".webpLoader__barProgress"),this.progressSize=this.section.querySelector(".webpLoader__sizeProgress"),this.errors=this.section.querySelector(".webpLoader__errors"),this.errorsInner=this.errors.querySelector(".webpLoader__errorsContentList"),this.errorsMessage=this.errors.querySelector(".webpLoader__errorsContentMessage"),this.success=this.section.querySelector(".webpLoader__success"),this.succesPopup=this.section.querySelector(".webpLoader__popup"),this.inputOptions=this.section.querySelectorAll('input[type="checkbox"]'),this.button=this.section.querySelector(".webpLoader__button"),this.data={count:0,max:0,items:[],size:{before:0,after:0},errors:[]},this.settings={isDisabled:!1,ajax:{urlPaths:this.section.getAttribute("data-api-paths"),urlRegenerate:this.section.getAttribute("data-api-regenerate"),errorMessage:this.section.getAttribute("data-api-error-message")},units:["kB","MB","GB"]},this.atts={progress:"data-percent"},this.classes={progressError:"webpLoader__barProgress--error",buttonDisabled:"webpLoader__button--disabled"},!0}},{key:"setEvents",value:function(){this.button.addEventListener("click",this.initRegenerate.bind(this))}},{key:"initRegenerate",value:function(t){if(t.preventDefault(),!this.settings.isDisabled){this.settings.isDisabled=!0,this.button.classList.add(this.classes.buttonDisabled);for(var e=this.inputOptions.length,r=0;r<e;r++)this.inputOptions[r].setAttribute("disabled",!0);this.wrapper.removeAttribute("hidden"),this.getImagesList()}}},{key:"getImagesList",value:function(){var t=this;jQuery.ajax(this.settings.ajax.urlPaths,{type:"POST",data:this.getDataForPathsRequest()}).done((function(e){t.data.items=e,t.data.max=e.length,t.regenerateNextImages()})).fail((function(){t.progress.classList.add(t.classes.progressError),t.errorsMessage.removeAttribute("hidden"),t.errors.removeAttribute("hidden")}))}},{key:"getDataForPathsRequest",value:function(){for(var t={},e=this.inputOptions.length,r=0;r<e;r++)t[this.inputOptions[r].getAttribute("name")]=this.inputOptions[r].checked?1:0;return t}},{key:"regenerateNextImages",value:function(){if(0===this.data.max&&this.updateProgress(),!(this.data.count>=this.data.max)){var t=this.data.items[this.data.count];this.data.count++,this.sendRequest(t)}}},{key:"sendRequest",value:function(t){var e=this;jQuery.ajax(this.settings.ajax.urlRegenerate,{type:"POST",data:{paths:t}}).done((function(t){e.updateErrors(t.errors),e.updateSize(t),e.updateProgress(),e.regenerateNextImages()})).fail((function(){var r=JSON.stringify(t),n=e.settings.ajax.errorMessage.replace("%s","<code>".concat(r,"</code>"));e.updateErrors([n]),e.regenerateNextImages()}))}},{key:"updateErrors",value:function(t){0!==t.length&&(this.data.errors=this.data.errors.concat(t),this.errorsInner.innerHTML=this.data.errors.join("<br>"),this.errors.removeAttribute("hidden"))}},{key:"updateSize",value:function(t){var e=this.data.size;e.before+=t.size.before,e.after+=t.size.after;var r=e.before-e.after;if(r<0&&(r=0),0!==r){var n=Math.round(100*(1-e.after/e.before));n<0&&(n=0);var i=-1;do{i++,r/=1024}while(r>1024);var s=r.toFixed(2),o=this.settings.units[i],a="".concat(s," ").concat(o," (").concat(n,"%)");this.progressSize.innerHTML=a}}},{key:"updateProgress",value:function(){var t=this.data.max>0?Math.floor(this.data.count/this.data.max*100):100;t>100&&(t=100),100===t&&(this.success.removeAttribute("hidden"),this.succesPopup.removeAttribute("hidden")),this.progress.setAttribute(this.atts.progress,t)}}])&&a(e.prototype,r),n&&a(e,n),t}();new function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),new i,new o,new u}},function(t,e){}]);