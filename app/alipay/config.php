<?php
return [
		//应用ID,您的APPID。
		'app_id' => "2016101900723516",

		//商户私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAqUY+FHriCdir7yGGb4/e4c4nvSU5oMmQbN1nT8XM2tJ5Xn+jmg3iYb6FkkIAnsr+iBL8dF2zFElwRYLiu0yTHHAjdhwVAOVuqJKPLkI1D1IqazFyNGsdoRMXo11TuCB1GFKYVFzS5gogb+uj2vLpK01A+BY9L9BLosaY9aPDPfDzYjAc7k0Bo2zNYWwY+FURDAZRoVXxECrk8+cmN03AJKp5u92/2NkfMkUWtlL6iPRqePFxXs0N50n4GdeqlEQyBXHEaQJW2Zti+nUNwtCVKPdpNPGs8vTo1PQN5wMpap0gcIgUmO6kpNje1OkOwhRsEPqCSRIXGk+8BkydyP76lwIDAQABAoIBAGuAjaqKBAXG0iKTQwKU9zKmr3wjKP8hI5TP4225LAmIg8Xs/+S1jqEO01t4iVZPiui2ThhE7ZcjsKakogPbdM4ptYur9/bSvr1WHpJ9P59USlY7V9FMecuzCV8ZxTJ5goQI6G8jaFjp84HAwBYsEMMMVAd6cC9udKqSv8+4yiUKVOHxZm3GBKNyGB+cAJ6d8n7iTIrAxhGu337rNkjYAhbS5s+bAOSWnyZDUAj0RtxXSmiqHGuLP33P5QgI3+kKacl1C8TzcgxvVYAWRPV+2tF71n893ErHZDYECxX90E4tRDG+ZKgM7pvWsxss+Z0n8htcT9SmBq3PsoLKRlCh53kCgYEA/GfnCqqlA611jaS36ZTo+Hr+GmpRGmHvO08PJPrA6T8EIL1it4GSqNlqxrH18pTNpt38II3TJlmWvOZPHoPjdyMw/umO2R6FNI/ggFjrgBeqyDirMw4DGzAdIhTJBor7dI1G4s+dE7Y6hifE2yaDHl0AUhwfQaF9VxE46nL6VW0CgYEAq69MzXRygkEWIm5AGDiKvP7OPgkoM0b2ZFUeoe4xrgIKqyDA8FfeYyBxBbh5QHaCYYN4tqTaUfq7YDRgafPWH8Zz44554CfcMtxYhut/jmUfrenwD6R5c6mGW688dAbInAfyRZhfoPsVjeMdGUmxDuVb6PTWE7/MkVBALpqEgZMCgYAbxKqMZ92jm++014xMLE+9FnriGRQ3HNMe6UG3Rcb3YjFoEK3Nlnm2DcVLesSeHXTKiN12D2RNccm9mnDV4JijwMFhKfzHMi5ha/q85At0miX1xRZAlagN06tA1pyPFbc4SVqlFUYopwGlRLbJjWEbdAvW/LULmWKas5BZarDTuQKBgHU2JkIymSbyVrFFAf9HQvkLITVbPRXdAcS4FETLgSFihXQV1YOBCfQ1JtSYADgRcKwwfQ58+Ax2GMzylUxgy7Q/4cje8bgmnoAezVW3nAtUYM90Yo/bY4uilncr6SLxqq5UAoSfJdKa+Tk4cBpepEIeNqSR20H6dShUWK04kvR/AoGBALwL6+BkB2MPR7wHnOLXrV6n1Utwb41dz+QwHidMiuJoKTQUlz8nYZxM8wJ4iqUelgATNgo7RhVdN/ySBZwd2gO3LVBNscpOwl4UQicYBnjwXEtYkY9g+8ED1kIypgx6mCcI94vrFk7Z4yjHdFeBiPB0EB+FWfjVQizwkbUFALOC",
		
		//异步通知地址
		'notify_url' => "http://blog.index.com/notify_url",
		
		//同步跳转
		'return_url' => "http://blog.index.com/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB",
];
?>