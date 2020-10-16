<?php
return [
		//应用ID,您的APPID。
		'app_id' => "2016101900723516",

		//商户私钥
		'merchant_private_key' => "MIIEogIBAAKCAQEAhYHCyO3+h52QUQzdrP298q0BMscTh1P1hS/t0Q87p5hpPBRi6i6Q3SJI1qgWcP5Kf4NTnBmdmp55LDv5XXoG5TgncmV3Zf1BwHZESUodqf33AM0G8coVy/oUsN/nagNYBG1N/hJo+d8ObK/OMtQz7K2YuftwGOtaa7iTaA1r/Qa5JC4AXQ3LdAXEbXO0BYn4+htNG9hQzAISw6NRrGRAXeFckw8PQsStAwpxM0f/axbB6cd32heuXV/rw+zPfSlnOPPcBWb4f9ifu8wfGeqaKnf1CSBdr2cbzpt0uWwEXMx8B59VwZCS3/y0ZOpNKuTCjHFhCP7u20rSwq3sw4lVuwIDAQABAoIBAAjoAyqMVfKOHFaL2S31L3rE99N/XFomy7Y64E6WCZDApiSP55lfyeI2q01GoVigXi/rfuRnARCTidndlmEaBuO7v0XuZuyy3HQOb7fD7f6tJpEzHEd9B783y7GQ/ksgNfr1n8JXUBF7Q+cUQ1k4ts4PNqURlQTUjo+pHIxQeOfENmI8Ug5/2Xs12yj5E5gRMJNLRggv2xFEqkhY0FHh0ZuoGV/+rY43CifYqY7NFg1njFYahz/UBuxf80Uns0N62u+Mn99HOEx/iZsJvPgqVfzvxTLlXuCs8mawYTW2v1CYU1Vk6SNzGkz8xqHBR9wrXxDffXO2cui0LtmYhSu7yQECgYEAu/mofY+2SiVBPUyijnOx2c9wA/VmZn3elHvTG1tPpxAyDVMKCHJRA+Dy2CZoxmY5/dKYdj+w4IZ9PRpaymFcex1A2oWnN/NPmPK6/V37+q7vIeLVDeYRKqGwnEbV8jqWUZ97k5mX1vHZTz1NI/eOoGxhdtilaS9onAr2JlEYo1sCgYEAtdIQJpbkRWcqRhWPiFe2W1USQ49/iyWidzHZirYjJnNLPPnAT16WTZ6H8K3b5Mn64M14tKRH9d36W+s2Lpz28KbZr4dMEsahfwXEislSvfk02Y0zFViv746oVWW07WZj16CSZSaNXCFAdd7G/ckL7llLvQgR7qaMwBlsbeXahSECgYAY0ODZkrtyFnECcreTLtrv8l7LZv5Z0Yws9hvspKVjXNP+xlOwwcbISE5HEusKJjzJsZ/HHKlxOtAV3QDXbvsSlc4WC0cEL+72NjVRdbLqaWXQh22xJApoImh6eS+NhwaJSBC8b66IBe22dFVWxjviGezUD83mkQeychAFBvfFuQKBgDjoJmXtlESkpXaKCQKDcW/kkHLU1vaWMONdltjzaM0ACOxsvuQYlrJ0i9eokspo7TyvErh3Mo6hi1p5o9uzBRcNIdTuY8D8qk83XuyRVnRfK0tsBjEIMQipfcY8rwQep+E1QJyoFFZhketSbrW/1xwilrHzdKldN3BohKdg6aQBAoGAcHxZGSIgXfJxPkXQnfUWPCN09vN+pKkB5P2PsRrS7ytUMva2f85l7D+uh7bkmbNYGJXFMxvPCkZFdRRB6ENkw+x2jhrt0ewbmOB9fBU7e/0bfokQDbbaWPFAcujH3FIetN7Mg9l+IJcbsGqHAi/ML9iLMPEN1QLGYuc4fJ9Xb40=",
		
		//异步通知地址
		'notify_url' => "http://kai.lvluo.site/notify_url",
		
		//同步跳转
		'return_url' => "http://kai.lvluo.site/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAo60ZlI7w2R0EBjr0dskGti1K6+KHN5j7mVHu0zXnHq/fJDYvCuIXjLXrwhHoWjrwJz9mW46+yVGWJYJW0NCbzj1AJCIjDNk7HwIHxRDj3FxobEKiowZ0bdJcZF8+4HsYfJW0Pg8FqKmqT4mUpEL2nzWvw2DPFWwVJEMxh05+r83eFtQ8fvpCfiGMh6lw9RNcnRBQa3PIVrZgE72+hL1fzlW66S7fMt23x6ysPUaHB8LKBLBAtNI1KnpTzZe5KKIZOqvJF7fInoSG5HyjLAafVOAfOzp0idIEXh6C+CVuDb2jYmRcGWiTRPQgx+KGVyz2NGT8DgKEnsVNSzr7cTkeKQIDAQAB",
];
?>