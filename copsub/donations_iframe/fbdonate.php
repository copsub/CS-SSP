<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >

<title>Facebook Paypal Donation</title>

<style>
body {
margin:0px;
font-family: helvetica, sans-serif;
}

input[type=text]#amount-field {
font-size:20px;
width:90%;
}

#currency_code{
  font-size: 16px;
}

input#paypal-submit{
  display: none;
}

#bank-donate{
  left:288px;
  top:360px;
}

.donate-button h3{
  font-size: 30px;
  padding: 0;
  margin:0;
  font-weight: bold;
}
.donate-button p{
  margin:0;
  padding: 0;
}

.payment-modal{
  display: none;
  z-index: 9999;
  position: absolute;
  padding: 15px 25px 25px 25px;
  background-color: #e2c9be;
  top: 10%;
  width: 50%;
  left: 10%;
  border-radius: 10px;
}

.modal-close{
  float:right;
  text-decoration: none;
  color: white;
  font-weight: bold;
  font-size: 12px;
  background-color: #ff4f00;
  padding: 2px 4px;
  border-radius: 2px;
}
.payment-modal input[type="text"], .payment-modal input[type="number"], .payment-modal input[type="email"]{
  font-size: 16px;
  padding: 5px;
  width: 270px;
}
#bank-transfer-modal a.button{
  color: white;
  display: block;
  padding: 10px;
  font-weight: bold;
  background-color: #ff4f00;
  text-decoration: none;
  font-size:30px;
  width: 150px;
  text-align: center;
  margin-top: 10px;
}
#bank-transfer-modal a:hover{
  cursor:pointer;
}
#paypal-form{
  display: none;
}





.wrapper_donate_section_1 {
  width: 100%; 
/*  display: inline-block; */
  position: relative;
  background-position: center top;
  background-repeat:no-repeat;
  background-size:100% !important;
	background-image: url('//copenhagensuborbitals.com/ext/fbtab/fbbackground.png');


}
.wrapper_donate_section_1:after {
  display: block;
  content: '';
  padding-top: 198%;

}
.main_donate_section_1 {
  position: absolute;
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
}
.main_donate_section_1_overlay_1 {
  position: absolute;
  top: 5%;
  bottom: 87%;
  right: 44%;
  left: 6%;
}
.main_donate_section_1_overlay_2 {
  position: absolute;
  top: 13%;
  bottom: 84.5%;
  right: 44%;
  left: 6%;
}
.main_donate_section_1_overlay_3 {
  position: absolute;
  top: 21.75%;
  bottom: 76%;
  right: 44%;
  left: 11.5%;
}
.main_donate_section_1_overlay_4 {
  position: absolute;
  top: 36%;
  bottom: 54%;
  right: 46%;
  left: 6%;
}
.main_donate_section_1_overlay_5 {
  position: absolute;
  top: 68%;
  bottom: 27%;
  right: 34%;
  left: 32%;
}
.main_donate_section_1_overlay_6 {
  position: absolute;
  top: 72%;
  bottom: 26%;
  right: 28%;
  left: 43%;
}
.main_donate_section_1_overlay_7 {
  position: absolute;
  top: 28%;
  bottom: 66.2%;
  right: 68%;
  left: 6%;
  background-color: #ff4f00;
  padding: 1%;
  color: #FFFFFF;
  text-align: center;
}
.main_donate_section_1_overlay_7:hover{
  cursor:pointer;
  background-color: #bababa;
}
.main_donate_section_1_overlay_8 {
  position: absolute;
  top: 28%;
  bottom: 66.2%;
  right: 40%;
  left: 35%;
  background-color: #ff4f00;
  padding: 1%;
  color: #FFFFFF;
  text-align: center;
}
.main_donate_section_1_overlay_8:hover{
  cursor:pointer;
  background-color: #bababa;
}
.main_donate_section_1_overlay_14 {
  position: absolute;
  top: 28%;
  bottom: 66.2%;
  right: 13%;
  left: 63%;
  background-color: #ff4f00;
  padding: 1%;
  color: #FFFFFF;
  text-align: center;
}
.main_donate_section_1_overlay_14:hover{
  cursor:pointer;
  background-color: #bababa;
}
.main_donate_section_1_overlay_9 {
  position: absolute;
  top: 20.5%;
  bottom: 75.35%;
  right: 89%;
  left: 5%;
	margin: 0;
}
.main_donate_section_1_overlay_10 {
  position: absolute;
  top: 16%;
  bottom: 81.5%;
  right: 76%;
  left: 7%;
	margin: 0;
}
.main_donate_section_1_overlay_11 {
  position: absolute;
  top: 16.15%;
  bottom: 79.5%;
  right: 65%;
  left: 25%;
	margin: 0;
}
.main_donate_section_1_overlay_12 {
  position: absolute;
  top: 21%;
  bottom: 78.5%;
  right: 46%;
  left: 6%;
	margin: 0;
}
.main_donate_section_1_overlay_13 {
  position: absolute;
  top: 24.5%;
  bottom: 75.0%;
  right: 46%;
  left: 6%;
	margin: 0;
}


.overlay_show {
	/* border: solid #AAA 1px; */
}


</style>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script>

/*! jQuery Validation Plugin - v1.13.1 - 10/14/2014
 * http://jqueryvalidation.org/
 * Copyright (c) 2014 Jörn Zaefferer; Licensed MIT */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){a.extend(a.fn,{validate:function(b){if(!this.length)return void(b&&b.debug&&window.console&&console.warn("Nothing selected, can't validate, returning nothing."));var c=a.data(this[0],"validator");return c?c:(this.attr("novalidate","novalidate"),c=new a.validator(b,this[0]),a.data(this[0],"validator",c),c.settings.onsubmit&&(this.validateDelegate(":submit","click",function(b){c.settings.submitHandler&&(c.submitButton=b.target),a(b.target).hasClass("cancel")&&(c.cancelSubmit=!0),void 0!==a(b.target).attr("formnovalidate")&&(c.cancelSubmit=!0)}),this.submit(function(b){function d(){var d,e;return c.settings.submitHandler?(c.submitButton&&(d=a("<input type='hidden'/>").attr("name",c.submitButton.name).val(a(c.submitButton).val()).appendTo(c.currentForm)),e=c.settings.submitHandler.call(c,c.currentForm,b),c.submitButton&&d.remove(),void 0!==e?e:!1):!0}return c.settings.debug&&b.preventDefault(),c.cancelSubmit?(c.cancelSubmit=!1,d()):c.form()?c.pendingRequest?(c.formSubmitted=!0,!1):d():(c.focusInvalid(),!1)})),c)},valid:function(){var b,c;return a(this[0]).is("form")?b=this.validate().form():(b=!0,c=a(this[0].form).validate(),this.each(function(){b=c.element(this)&&b})),b},removeAttrs:function(b){var c={},d=this;return a.each(b.split(/\s/),function(a,b){c[b]=d.attr(b),d.removeAttr(b)}),c},rules:function(b,c){var d,e,f,g,h,i,j=this[0];if(b)switch(d=a.data(j.form,"validator").settings,e=d.rules,f=a.validator.staticRules(j),b){case"add":a.extend(f,a.validator.normalizeRule(c)),delete f.messages,e[j.name]=f,c.messages&&(d.messages[j.name]=a.extend(d.messages[j.name],c.messages));break;case"remove":return c?(i={},a.each(c.split(/\s/),function(b,c){i[c]=f[c],delete f[c],"required"===c&&a(j).removeAttr("aria-required")}),i):(delete e[j.name],f)}return g=a.validator.normalizeRules(a.extend({},a.validator.classRules(j),a.validator.attributeRules(j),a.validator.dataRules(j),a.validator.staticRules(j)),j),g.required&&(h=g.required,delete g.required,g=a.extend({required:h},g),a(j).attr("aria-required","true")),g.remote&&(h=g.remote,delete g.remote,g=a.extend(g,{remote:h})),g}}),a.extend(a.expr[":"],{blank:function(b){return!a.trim(""+a(b).val())},filled:function(b){return!!a.trim(""+a(b).val())},unchecked:function(b){return!a(b).prop("checked")}}),a.validator=function(b,c){this.settings=a.extend(!0,{},a.validator.defaults,b),this.currentForm=c,this.init()},a.validator.format=function(b,c){return 1===arguments.length?function(){var c=a.makeArray(arguments);return c.unshift(b),a.validator.format.apply(this,c)}:(arguments.length>2&&c.constructor!==Array&&(c=a.makeArray(arguments).slice(1)),c.constructor!==Array&&(c=[c]),a.each(c,function(a,c){b=b.replace(new RegExp("\\{"+a+"\\}","g"),function(){return c})}),b)},a.extend(a.validator,{defaults:{messages:{},groups:{},rules:{},errorClass:"error",validClass:"valid",errorElement:"label",focusCleanup:!1,focusInvalid:!0,errorContainer:a([]),errorLabelContainer:a([]),onsubmit:!0,ignore:":hidden",ignoreTitle:!1,onfocusin:function(a){this.lastActive=a,this.settings.focusCleanup&&(this.settings.unhighlight&&this.settings.unhighlight.call(this,a,this.settings.errorClass,this.settings.validClass),this.hideThese(this.errorsFor(a)))},onfocusout:function(a){this.checkable(a)||!(a.name in this.submitted)&&this.optional(a)||this.element(a)},onkeyup:function(a,b){(9!==b.which||""!==this.elementValue(a))&&(a.name in this.submitted||a===this.lastElement)&&this.element(a)},onclick:function(a){a.name in this.submitted?this.element(a):a.parentNode.name in this.submitted&&this.element(a.parentNode)},highlight:function(b,c,d){"radio"===b.type?this.findByName(b.name).addClass(c).removeClass(d):a(b).addClass(c).removeClass(d)},unhighlight:function(b,c,d){"radio"===b.type?this.findByName(b.name).removeClass(c).addClass(d):a(b).removeClass(c).addClass(d)}},setDefaults:function(b){a.extend(a.validator.defaults,b)},messages:{required:"This field is required.",remote:"Please fix this field.",email:"Please enter a valid email address.",url:"Please enter a valid URL.",date:"Please enter a valid date.",dateISO:"Please enter a valid date ( ISO ).",number:"Please enter a valid number.",digits:"Please enter only digits.",creditcard:"Please enter a valid credit card number.",equalTo:"Please enter the same value again.",maxlength:a.validator.format("Please enter no more than {0} characters."),minlength:a.validator.format("Please enter at least {0} characters."),rangelength:a.validator.format("Please enter a value between {0} and {1} characters long."),range:a.validator.format("Please enter a value between {0} and {1}."),max:a.validator.format("Please enter a value less than or equal to {0}."),min:a.validator.format("Please enter a value greater than or equal to {0}.")},autoCreateRanges:!1,prototype:{init:function(){function b(b){var c=a.data(this[0].form,"validator"),d="on"+b.type.replace(/^validate/,""),e=c.settings;e[d]&&!this.is(e.ignore)&&e[d].call(c,this[0],b)}this.labelContainer=a(this.settings.errorLabelContainer),this.errorContext=this.labelContainer.length&&this.labelContainer||a(this.currentForm),this.containers=a(this.settings.errorContainer).add(this.settings.errorLabelContainer),this.submitted={},this.valueCache={},this.pendingRequest=0,this.pending={},this.invalid={},this.reset();var c,d=this.groups={};a.each(this.settings.groups,function(b,c){"string"==typeof c&&(c=c.split(/\s/)),a.each(c,function(a,c){d[c]=b})}),c=this.settings.rules,a.each(c,function(b,d){c[b]=a.validator.normalizeRule(d)}),a(this.currentForm).validateDelegate(":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'] ,[type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'], [type='radio'], [type='checkbox']","focusin focusout keyup",b).validateDelegate("select, option, [type='radio'], [type='checkbox']","click",b),this.settings.invalidHandler&&a(this.currentForm).bind("invalid-form.validate",this.settings.invalidHandler),a(this.currentForm).find("[required], [data-rule-required], .required").attr("aria-required","true")},form:function(){return this.checkForm(),a.extend(this.submitted,this.errorMap),this.invalid=a.extend({},this.errorMap),this.valid()||a(this.currentForm).triggerHandler("invalid-form",[this]),this.showErrors(),this.valid()},checkForm:function(){this.prepareForm();for(var a=0,b=this.currentElements=this.elements();b[a];a++)this.check(b[a]);return this.valid()},element:function(b){var c=this.clean(b),d=this.validationTargetFor(c),e=!0;return this.lastElement=d,void 0===d?delete this.invalid[c.name]:(this.prepareElement(d),this.currentElements=a(d),e=this.check(d)!==!1,e?delete this.invalid[d.name]:this.invalid[d.name]=!0),a(b).attr("aria-invalid",!e),this.numberOfInvalids()||(this.toHide=this.toHide.add(this.containers)),this.showErrors(),e},showErrors:function(b){if(b){a.extend(this.errorMap,b),this.errorList=[];for(var c in b)this.errorList.push({message:b[c],element:this.findByName(c)[0]});this.successList=a.grep(this.successList,function(a){return!(a.name in b)})}this.settings.showErrors?this.settings.showErrors.call(this,this.errorMap,this.errorList):this.defaultShowErrors()},resetForm:function(){a.fn.resetForm&&a(this.currentForm).resetForm(),this.submitted={},this.lastElement=null,this.prepareForm(),this.hideErrors(),this.elements().removeClass(this.settings.errorClass).removeData("previousValue").removeAttr("aria-invalid")},numberOfInvalids:function(){return this.objectLength(this.invalid)},objectLength:function(a){var b,c=0;for(b in a)c++;return c},hideErrors:function(){this.hideThese(this.toHide)},hideThese:function(a){a.not(this.containers).text(""),this.addWrapper(a).hide()},valid:function(){return 0===this.size()},size:function(){return this.errorList.length},focusInvalid:function(){if(this.settings.focusInvalid)try{a(this.findLastActive()||this.errorList.length&&this.errorList[0].element||[]).filter(":visible").focus().trigger("focusin")}catch(b){}},findLastActive:function(){var b=this.lastActive;return b&&1===a.grep(this.errorList,function(a){return a.element.name===b.name}).length&&b},elements:function(){var b=this,c={};return a(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, [disabled], [readonly]").not(this.settings.ignore).filter(function(){return!this.name&&b.settings.debug&&window.console&&console.error("%o has no name assigned",this),this.name in c||!b.objectLength(a(this).rules())?!1:(c[this.name]=!0,!0)})},clean:function(b){return a(b)[0]},errors:function(){var b=this.settings.errorClass.split(" ").join(".");return a(this.settings.errorElement+"."+b,this.errorContext)},reset:function(){this.successList=[],this.errorList=[],this.errorMap={},this.toShow=a([]),this.toHide=a([]),this.currentElements=a([])},prepareForm:function(){this.reset(),this.toHide=this.errors().add(this.containers)},prepareElement:function(a){this.reset(),this.toHide=this.errorsFor(a)},elementValue:function(b){var c,d=a(b),e=b.type;return"radio"===e||"checkbox"===e?a("input[name='"+b.name+"']:checked").val():"number"===e&&"undefined"!=typeof b.validity?b.validity.badInput?!1:d.val():(c=d.val(),"string"==typeof c?c.replace(/\r/g,""):c)},check:function(b){b=this.validationTargetFor(this.clean(b));var c,d,e,f=a(b).rules(),g=a.map(f,function(a,b){return b}).length,h=!1,i=this.elementValue(b);for(d in f){e={method:d,parameters:f[d]};try{if(c=a.validator.methods[d].call(this,i,b,e.parameters),"dependency-mismatch"===c&&1===g){h=!0;continue}if(h=!1,"pending"===c)return void(this.toHide=this.toHide.not(this.errorsFor(b)));if(!c)return this.formatAndAdd(b,e),!1}catch(j){throw this.settings.debug&&window.console&&console.log("Exception occurred when checking element "+b.id+", check the '"+e.method+"' method.",j),j}}if(!h)return this.objectLength(f)&&this.successList.push(b),!0},customDataMessage:function(b,c){return a(b).data("msg"+c.charAt(0).toUpperCase()+c.substring(1).toLowerCase())||a(b).data("msg")},customMessage:function(a,b){var c=this.settings.messages[a];return c&&(c.constructor===String?c:c[b])},findDefined:function(){for(var a=0;a<arguments.length;a++)if(void 0!==arguments[a])return arguments[a];return void 0},defaultMessage:function(b,c){return this.findDefined(this.customMessage(b.name,c),this.customDataMessage(b,c),!this.settings.ignoreTitle&&b.title||void 0,a.validator.messages[c],"<strong>Warning: No message defined for "+b.name+"</strong>")},formatAndAdd:function(b,c){var d=this.defaultMessage(b,c.method),e=/\$?\{(\d+)\}/g;"function"==typeof d?d=d.call(this,c.parameters,b):e.test(d)&&(d=a.validator.format(d.replace(e,"{$1}"),c.parameters)),this.errorList.push({message:d,element:b,method:c.method}),this.errorMap[b.name]=d,this.submitted[b.name]=d},addWrapper:function(a){return this.settings.wrapper&&(a=a.add(a.parent(this.settings.wrapper))),a},defaultShowErrors:function(){var a,b,c;for(a=0;this.errorList[a];a++)c=this.errorList[a],this.settings.highlight&&this.settings.highlight.call(this,c.element,this.settings.errorClass,this.settings.validClass),this.showLabel(c.element,c.message);if(this.errorList.length&&(this.toShow=this.toShow.add(this.containers)),this.settings.success)for(a=0;this.successList[a];a++)this.showLabel(this.successList[a]);if(this.settings.unhighlight)for(a=0,b=this.validElements();b[a];a++)this.settings.unhighlight.call(this,b[a],this.settings.errorClass,this.settings.validClass);this.toHide=this.toHide.not(this.toShow),this.hideErrors(),this.addWrapper(this.toShow).show()},validElements:function(){return this.currentElements.not(this.invalidElements())},invalidElements:function(){return a(this.errorList).map(function(){return this.element})},showLabel:function(b,c){var d,e,f,g=this.errorsFor(b),h=this.idOrName(b),i=a(b).attr("aria-describedby");g.length?(g.removeClass(this.settings.validClass).addClass(this.settings.errorClass),g.html(c)):(g=a("<"+this.settings.errorElement+">").attr("id",h+"-error").addClass(this.settings.errorClass).html(c||""),d=g,this.settings.wrapper&&(d=g.hide().show().wrap("<"+this.settings.wrapper+"/>").parent()),this.labelContainer.length?this.labelContainer.append(d):this.settings.errorPlacement?this.settings.errorPlacement(d,a(b)):d.insertAfter(b),g.is("label")?g.attr("for",h):0===g.parents("label[for='"+h+"']").length&&(f=g.attr("id").replace(/(:|\.|\[|\])/g,"\\$1"),i?i.match(new RegExp("\\b"+f+"\\b"))||(i+=" "+f):i=f,a(b).attr("aria-describedby",i),e=this.groups[b.name],e&&a.each(this.groups,function(b,c){c===e&&a("[name='"+b+"']",this.currentForm).attr("aria-describedby",g.attr("id"))}))),!c&&this.settings.success&&(g.text(""),"string"==typeof this.settings.success?g.addClass(this.settings.success):this.settings.success(g,b)),this.toShow=this.toShow.add(g)},errorsFor:function(b){var c=this.idOrName(b),d=a(b).attr("aria-describedby"),e="label[for='"+c+"'], label[for='"+c+"'] *";return d&&(e=e+", #"+d.replace(/\s+/g,", #")),this.errors().filter(e)},idOrName:function(a){return this.groups[a.name]||(this.checkable(a)?a.name:a.id||a.name)},validationTargetFor:function(b){return this.checkable(b)&&(b=this.findByName(b.name)),a(b).not(this.settings.ignore)[0]},checkable:function(a){return/radio|checkbox/i.test(a.type)},findByName:function(b){return a(this.currentForm).find("[name='"+b+"']")},getLength:function(b,c){switch(c.nodeName.toLowerCase()){case"select":return a("option:selected",c).length;case"input":if(this.checkable(c))return this.findByName(c.name).filter(":checked").length}return b.length},depend:function(a,b){return this.dependTypes[typeof a]?this.dependTypes[typeof a](a,b):!0},dependTypes:{"boolean":function(a){return a},string:function(b,c){return!!a(b,c.form).length},"function":function(a,b){return a(b)}},optional:function(b){var c=this.elementValue(b);return!a.validator.methods.required.call(this,c,b)&&"dependency-mismatch"},startRequest:function(a){this.pending[a.name]||(this.pendingRequest++,this.pending[a.name]=!0)},stopRequest:function(b,c){this.pendingRequest--,this.pendingRequest<0&&(this.pendingRequest=0),delete this.pending[b.name],c&&0===this.pendingRequest&&this.formSubmitted&&this.form()?(a(this.currentForm).submit(),this.formSubmitted=!1):!c&&0===this.pendingRequest&&this.formSubmitted&&(a(this.currentForm).triggerHandler("invalid-form",[this]),this.formSubmitted=!1)},previousValue:function(b){return a.data(b,"previousValue")||a.data(b,"previousValue",{old:null,valid:!0,message:this.defaultMessage(b,"remote")})}},classRuleSettings:{required:{required:!0},email:{email:!0},url:{url:!0},date:{date:!0},dateISO:{dateISO:!0},number:{number:!0},digits:{digits:!0},creditcard:{creditcard:!0}},addClassRules:function(b,c){b.constructor===String?this.classRuleSettings[b]=c:a.extend(this.classRuleSettings,b)},classRules:function(b){var c={},d=a(b).attr("class");return d&&a.each(d.split(" "),function(){this in a.validator.classRuleSettings&&a.extend(c,a.validator.classRuleSettings[this])}),c},attributeRules:function(b){var c,d,e={},f=a(b),g=b.getAttribute("type");for(c in a.validator.methods)"required"===c?(d=b.getAttribute(c),""===d&&(d=!0),d=!!d):d=f.attr(c),/min|max/.test(c)&&(null===g||/number|range|text/.test(g))&&(d=Number(d)),d||0===d?e[c]=d:g===c&&"range"!==g&&(e[c]=!0);return e.maxlength&&/-1|2147483647|524288/.test(e.maxlength)&&delete e.maxlength,e},dataRules:function(b){var c,d,e={},f=a(b);for(c in a.validator.methods)d=f.data("rule"+c.charAt(0).toUpperCase()+c.substring(1).toLowerCase()),void 0!==d&&(e[c]=d);return e},staticRules:function(b){var c={},d=a.data(b.form,"validator");return d.settings.rules&&(c=a.validator.normalizeRule(d.settings.rules[b.name])||{}),c},normalizeRules:function(b,c){return a.each(b,function(d,e){if(e===!1)return void delete b[d];if(e.param||e.depends){var f=!0;switch(typeof e.depends){case"string":f=!!a(e.depends,c.form).length;break;case"function":f=e.depends.call(c,c)}f?b[d]=void 0!==e.param?e.param:!0:delete b[d]}}),a.each(b,function(d,e){b[d]=a.isFunction(e)?e(c):e}),a.each(["minlength","maxlength"],function(){b[this]&&(b[this]=Number(b[this]))}),a.each(["rangelength","range"],function(){var c;b[this]&&(a.isArray(b[this])?b[this]=[Number(b[this][0]),Number(b[this][1])]:"string"==typeof b[this]&&(c=b[this].replace(/[\[\]]/g,"").split(/[\s,]+/),b[this]=[Number(c[0]),Number(c[1])]))}),a.validator.autoCreateRanges&&(null!=b.min&&null!=b.max&&(b.range=[b.min,b.max],delete b.min,delete b.max),null!=b.minlength&&null!=b.maxlength&&(b.rangelength=[b.minlength,b.maxlength],delete b.minlength,delete b.maxlength)),b},normalizeRule:function(b){if("string"==typeof b){var c={};a.each(b.split(/\s/),function(){c[this]=!0}),b=c}return b},addMethod:function(b,c,d){a.validator.methods[b]=c,a.validator.messages[b]=void 0!==d?d:a.validator.messages[b],c.length<3&&a.validator.addClassRules(b,a.validator.normalizeRule(b))},methods:{required:function(b,c,d){if(!this.depend(d,c))return"dependency-mismatch";if("select"===c.nodeName.toLowerCase()){var e=a(c).val();return e&&e.length>0}return this.checkable(c)?this.getLength(b,c)>0:a.trim(b).length>0},email:function(a,b){return this.optional(b)||/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(a)},url:function(a,b){return this.optional(b)||/^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(a)},date:function(a,b){return this.optional(b)||!/Invalid|NaN/.test(new Date(a).toString())},dateISO:function(a,b){return this.optional(b)||/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(a)},number:function(a,b){return this.optional(b)||/^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(a)},digits:function(a,b){return this.optional(b)||/^\d+$/.test(a)},creditcard:function(a,b){if(this.optional(b))return"dependency-mismatch";if(/[^0-9 \-]+/.test(a))return!1;var c,d,e=0,f=0,g=!1;if(a=a.replace(/\D/g,""),a.length<13||a.length>19)return!1;for(c=a.length-1;c>=0;c--)d=a.charAt(c),f=parseInt(d,10),g&&(f*=2)>9&&(f-=9),e+=f,g=!g;return e%10===0},minlength:function(b,c,d){var e=a.isArray(b)?b.length:this.getLength(b,c);return this.optional(c)||e>=d},maxlength:function(b,c,d){var e=a.isArray(b)?b.length:this.getLength(b,c);return this.optional(c)||d>=e},rangelength:function(b,c,d){var e=a.isArray(b)?b.length:this.getLength(b,c);return this.optional(c)||e>=d[0]&&e<=d[1]},min:function(a,b,c){return this.optional(b)||a>=c},max:function(a,b,c){return this.optional(b)||c>=a},range:function(a,b,c){return this.optional(b)||a>=c[0]&&a<=c[1]},equalTo:function(b,c,d){var e=a(d);return this.settings.onfocusout&&e.unbind(".validate-equalTo").bind("blur.validate-equalTo",function(){a(c).valid()}),b===e.val()},remote:function(b,c,d){if(this.optional(c))return"dependency-mismatch";var e,f,g=this.previousValue(c);return this.settings.messages[c.name]||(this.settings.messages[c.name]={}),g.originalMessage=this.settings.messages[c.name].remote,this.settings.messages[c.name].remote=g.message,d="string"==typeof d&&{url:d}||d,g.old===b?g.valid:(g.old=b,e=this,this.startRequest(c),f={},f[c.name]=b,a.ajax(a.extend(!0,{url:d,mode:"abort",port:"validate"+c.name,dataType:"json",data:f,context:e.currentForm,success:function(d){var f,h,i,j=d===!0||"true"===d;e.settings.messages[c.name].remote=g.originalMessage,j?(i=e.formSubmitted,e.prepareElement(c),e.formSubmitted=i,e.successList.push(c),delete e.invalid[c.name],e.showErrors()):(f={},h=d||e.defaultMessage(c,"remote"),f[c.name]=g.message=a.isFunction(h)?h(b):h,e.invalid[c.name]=!0,e.showErrors(f)),g.valid=j,e.stopRequest(c,j)}},d)),"pending")}}}),a.format=function(){throw"$.format has been deprecated. Please use $.validator.format instead."};var b,c={};a.ajaxPrefilter?a.ajaxPrefilter(function(a,b,d){var e=a.port;"abort"===a.mode&&(c[e]&&c[e].abort(),c[e]=d)}):(b=a.ajax,a.ajax=function(d){var e=("mode"in d?d:a.ajaxSettings).mode,f=("port"in d?d:a.ajaxSettings).port;return"abort"===e?(c[f]&&c[f].abort(),c[f]=b.apply(this,arguments),c[f]):b.apply(this,arguments)}),a.extend(a.fn,{validateDelegate:function(b,c,d){return this.bind(c,function(c){var e=a(c.target);return e.is(b)?d.apply(e,arguments):void 0})}})});

</script>

<script>



$.get("//ipinfo.io", function (response) {
	if (response.country == "DK") {
	$("#currency_code").val("DKK");
	}
	if (response.country == "DE") {
	$("#currency_code").val("EURO");
	}	
	if (response.country == "SE") {
	$("#currency_code").val("EURO");
	}
	if (response.country == "NO") {
	$("#currency_code").val("EURO");
	}	
	if (response.country == "ES") {
	$("#currency_code").val("EURO");
	}
	if (response.country == "US") {
	$("#currency_code").val("USD");
	}	
}, "jsonp");


function payWithBankTransferCallback(data){
  $('#bank-transfer-modal-content').html('<h1>Thank you for your donation!<br/></h1><h3>Please check your email, we have sent you instructions to donate via bank.</h3>');
}


function payWithBankTransfer(){
  if ($('#amount-field').val() == ''){
    alert('Please enter an amount');
    return;
  }
  var data = { action: 'dgx_donate_bank_transfer', email: $('#bank-transfer-email').val(), amount: $('#amount-field').val(), currency: $('#currency_code').val(), monthly: $('#supporter').is(":checked") };
  jQuery.post( '/wp-admin/admin-ajax.php', data, payWithBankTransferCallback );
  $('#bank-transfer-modal-content').html('<h3>Loading...</h3>');
  return false;
}

function payWithPaypalCallback(data){
  // Copy the encrypted string into the form field
  $('#encrypted-field').val(data);

  // Submit the form to Paypal
  $('#paypal-form').submit();
}

function payWithPaypal(){
  if ($('#amount-field').val() == ''){
    alert('Please enter an amount');
    return;
  }
  var data = { action: 'dgx_donate_paypal', amount: $('#amount-field').val(), currency: $('#currency_code').val(), monthly: $('#supporter').is(":checked") };
  jQuery.post( '/wp-admin/admin-ajax.php', data, payWithPaypalCallback );
  return false;
}

function openBitcoinModal(){
  $('#bitcoin-modal').show();
}

</script>




</head>
<body>


<div class="wrapper_donate_section_1">
	<div class="main_donate_section_1"></div>

		<div class="main_donate_section_1_overlay_1 overlay_show">	
  		<div style="font: 14vw helvetica, sans-serif; font-weight: bold; color: #FFFFFF;padding:0px;margin:0px;">Donate</div>
		</div>
		<div class="main_donate_section_1_overlay_2 overlay_show">	
  		<div style="font: 3vw helvetica, sans-serif; font-weight: bold; color: #FFFFFF;padding:0px;margin:0px;">How much would you like to give?</div>
		</div>
		<div class="main_donate_section_1_overlay_3 overlay_show">	
  		<div style="font: 3vw helvetica, sans-serif; font-weight: normal; color: #ff4f00;padding:0px;margin:0px;"><label for="supporter">Make this a monthly donation</label></div>
		</div>
		<div class="main_donate_section_1_overlay_4 overlay_show">	
  		<div style="font: 2.75vw helvetica, sans-serif; font-weight: normal; color: #FFFFFF;padding:0px;margin:0px;">
  		Even though everyone in Copenhagen Suborbitals are working for free, we need earth money to build spaceships. Tools, rent and materials are not free. This is a 100 % crowdfunded project. we need you to get into space!
  		</div>
		</div>
		<div class="main_donate_section_1_overlay_5 overlay_show">	
  		<div style="font: 9vw helvetica, sans-serif; font-weight: normal; color: #FFFFFF;padding:0px;margin:0px;">Thanks</div>
		</div>
		<div class="main_donate_section_1_overlay_6 overlay_show">	
  		<div style="font: 3.5vw helvetica, sans-serif; font-weight: normal; color: #ff4f00;padding:0px;margin:0px;">Now we're closer</div>
		</div>

  <form action="" id="donationform">
		<div class="main_donate_section_1_overlay_7 overlay_show">	
    	<div class="donate-button" id="paypal-donate" onclick="payWithPaypal();">
      	<div style="font: 5.5vw helvetica, sans-serif; font-weight: bold;">Donate</div>
      	<div style="font: 2.2vw helvetica, sans-serif; font-weight: normal;">via PayPal / Credit Card</div>
    	</div>
    </div>		
    <div class="main_donate_section_1_overlay_8 overlay_show">	
    	<div class="donate-button" id="bank-donate" onclick="$('#bank-transfer-modal').show();">
      	<div style="font: 5.5vw helvetica, sans-serif; font-weight: bold;">Donate</div>
      	<div style="font: 2.2vw helvetica, sans-serif; font-weight: normal;">via Bank Transfer</div>
    	</div>
    </div>
    <div class="main_donate_section_1_overlay_14 overlay_show">  
      <div class="donate-button" id="bitcoin-donate" onclick="openBitcoinModal()">
        <div style="font: 5.5vw helvetica, sans-serif; font-weight: bold;">Donate</div>
        <div style="font: 2.2vw helvetica, sans-serif; font-weight: normal;">via Bitcoin</div>
      </div>
    </div>    
    <div class="main_donate_section_1_overlay_9 overlay_show">	
    	<input type="checkbox" id="supporter" name="supporter" value="supporter" style="margin-top:50%;margin-left:30%">
    </div>
    <div class="main_donate_section_1_overlay_10 overlay_show">	
    	<input type="text" name="a3" id="amount-field" value="" style="">
    </div>
    <div class="main_donate_section_1_overlay_11 overlay_show">	
  	  <select name="currency_code" id="currency_code">
    	  <option value="USD">USD</option>
      	<option value="DKK">DKK</option>
      	<option value="EUR">EURO</option>
    	</select>
    </div>
  </form>

  <div class="main_donate_section_1_overlay_12 overlay_show">	
 	 	<div style="width:100%;background:url('//copenhagensuborbitals.com/ext/fbtab/dividerline.png') no-repeat;height:1px; "></div>
  </div>
  <div class="main_donate_section_1_overlay_13 overlay_show">	
 	 	<div style="width:100%;background:url('//copenhagensuborbitals.com/ext/fbtab/dividerline.png') no-repeat;height:1px; "></div>
  </div>




    -






  <div id="bank-transfer-modal" class="payment-modal">
    <a href="#" class="modal-close" onclick="$('#bank-transfer-modal').hide()">X</a>
    <form action="#" id="bank-transfer-modal-content" onsubmit="payWithBankTransfer()">
      <p>
        Please enter your email address so we can send you the donation instructions:
      </p>
      <input style="width: 80%" id="bank-transfer-email" type="email" name="email"/>
      <a class="button" href="#" onclick="payWithBankTransfer()">Send</a>
    </form>
  </div>



  <div id="bitcoin-modal" class="payment-modal">
    <a href="#" class="modal-close" onclick="$('#bitcoin-modal').hide()">X</a>
    <form action="https://bitpay.com/checkout" method="post">
      <input name="action" type="hidden" value="checkout">
      <input name="currency" type="hidden" value="BTC"/>

      <p>
        Please enter the amount of Bitcoins:<br/>
        <input class="bitpay-donate-field-price" name="price" type="number" value="0.01" placeholder="Amount" maxlength="10" min="0.003" step="0.001"/>
      </p>


      <p>
        Please enter your email address:<br/>
        <input style="width: 80%" type="email" name="orderID"/>
      </p>
      <br/>

      <input type="hidden" name="data" value="DPYnRzYytNuTX3ZB49ICAZNNZ9QcvOqt/Z9pdEV0goMIQYvUV2lF8/w+gzX+8YlJwD1uwEEZRkB4JyYaigMANTfmigt59ZgAQWBk2Oa43x/7Y32EW2rytXIWjr38PpvK2ZEBE/DGDN468vsTS968i/ct2+P5CWtC8reGi2apqryRXY1dWrkEAk9OOrsE9fCwdwy0n0E2XpcOCMAVoPb5zZIuTU0oEECsAUPys4CTF59ZL87REcXhDbrGlipE+gOhELDp5GxpNPyLhKgpNpbsgIBB15amwQt1fa0ojvS5qhgFvj8YhTNljxmv8sZQNHUWH1uPlE5eYkxZsNXqgqC8dQ=="> 
      <div class="bitpay-donate-button-wrapper">
        <input class="bitpay-donate-button" name="submit" src="https://bitpay.com/img/donate-button.svg" onerror="this.onerror=null; this.src='https://bitpay.com/img/donate-button-md.png'" width="126" height="48" type="image" alt="BitPay, the easy way to pay with bitcoins." border="0">
      </div>
    </form>
  </div>



  <!-- Replace with https://www.sandbox.paypal.com/cgi-bin/webscr for testing in the sandbox. Remember to change also the settings in dgx-donate-paypalstd.php -->
  <form id="paypal-form" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" id="encrypted-field" name="encrypted" value="">
    <input type="submit" value="Donate">
  </form>




<div>



</body>
</html>
