

(function($) {
	$.fn.validationEngineLanguage = function() {};
	$.validationEngineLanguage = {
		newLang: function() {
			$.validationEngineLanguage.allRules = 	{"required":{    			// Add your regex rules here, you can take telephone as an example
						"regex":"none",
						"alertText":"* 该项为必填项",
						"alertTextCheckboxMultiple":"* 请选择一项",
						"alertTextCheckboxe":"* 该项为必填项"},
					"length":{
						"regex":"none",
						"alertText":"*之间 ",
						"alertText2":" 和 ",
						"alertText3": " 个字符以内"},
					"maxCheckbox":{
						"regex":"none",
						"alertText":"* 超出最大选择范围"},
					"minCheckbox":{
						"regex":"none",
						"alertText":"* 请选择 ",
						"alertText2":" 选项"},
					"confirm":{
						"regex":"none",
						"alertText":"* 字段不匹配"},
					"telephone":{
						"regex":"/^[0-9\-\(\)\ ]+$/",
						"alertText":"* 无效电话号码"},
					"email":{
						"regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
						"alertText":"* 无效email"},
					"date":{
                         "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                         "alertText":"* 无效输入日期, 仅限 YYYY-MM-DD 格式"},
					"onlyNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"* 必须为整数类型"},
                                        "onlyCurrency":{
						"regex":"/^[-+]?[0-9]+(\.[0-9]+)?$/",
						"alertText":"* 必须为货币类型"},
                                        "onlyDigit":{
						"regex":"/^[-+]?[0-9]+(\.[0-9]+)?$/",
						"alertText":"* 必须为有效数字类型"},
					"noSpecialCaracters":{
						"regex":"/^[0-9a-zA-Z]+$/",
						"alertText":"* 仅允许输入英文与数字字符"},
					"ajaxUser":{
						"file":"validateUser.php",
						"extraData":"name=eric",
						"alertTextOk":"* 无效用户",
						"alertTextLoad":"* 加载中,　请稍后",
						"alertText":"* 该用户已登录"},
					"ajaxName":{
						"file":"validateUser.php",
						"alertText":"* 该名称已存在",
						"alertTextOk":"* 该名称可用",
						"alertTextLoad":"* 加载中,　请稍后"},
					"onlyLetter":{
						"regex":"/^[a-zA-Z\ \']+$/",
						"alertText":"* 仅允许输入英文字符"}
					}	
		}
	}
})(jQuery);

$(document).ready(function() {	
	$.validationEngineLanguage.newLang()
});