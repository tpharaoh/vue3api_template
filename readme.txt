echo "123123"|openssl genpkey -out config/jwt/private.pem -pass stdin -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096 << generate key
echo "123123"| openssl pkey -in config/jwt/private.pem -passin stdin -out config/jwt/public.pem -pubout

docker-compose up // starts db
symfony serve // starts server

//register example
var data = "{\"email\":\"company@user.com\",\"plainPassword\":\"abc123\",\"user_type\":\"company\"}";

var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === 4) {
    console.log(this.responseText);
  }
});

xhr.open("POST", "https://127.0.0.1:8001/register");

xhr.send(data);

//login
curl -k -X POST -H "Content-Type: application/json" https://127.0.0.1:8001/authentication_token -d '{"email":"company@user.com", "password":"abc123"}'
{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2MDUxNjkyNzQsImV4cCI6MTYwNTE3Mjg3NCwicm9sZXMiOlsiUk9MRV9DT01QQU5ZIiwiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoiY29tcGFueUB1c2VyLmNvbSJ9.frZdDrGsJ49xo3nLDaY3cVVXC1bD8bdZWK6laR_oIymwbg97FdrT7KtVkvuRnrEBgS0IzmPYYC99V8BxkKHOn-0NSCS953ShrST-G9ixHoxQezhTcwrmJbFgPhepldGJC4_Fsp_FE6EYQ-8th47fvTZU7F6-yyWUYfCq8JHBIjldm5XTGaCDg-hF4BXG51d0rue2vDPx6l3UlTtToulLBoTuJXEE_QtbM2y6A1GtjV4MmBM0ENOVkYw1nnf45Syj_8pS0FX1mksFIlwgfru0ntGjFtOnrMmeNxVB4jm4jCX-_l15ismh_Xoe0-njM6SzeiEtdyz_-RREb7ulBUaraglZOduj31i7xz5b7McRbge1vPSQrCBs7fiRST66RrfUmz5JTfMgmQzSrGrDUbla8Z5CcJTF1snIgN_ZwnqwmtUwKtzzI7m8dTwIU54fZDNx3O7gU-qG0tuJ6ZMHAdGsd8-DwUoZIItHXxwtun7L1k0or2Lcwlob52p8F-dGEnbRkHBh448kQWx5FrrcQgy10JVk6xnc5cl_eswESaTyTb3XjZ6sOgS-xozxnkWy8anvWqRmvxDkkVg-jnqbAl3U5GLEz9UkIQKWUaEkD_TRDE3JhtSrHX8M6_LEpAEQMqWD-CraNRfHrW_a5YTHHGURQxrkecOngeNCPXtFkdo388I"}%

NOTE: in my vuejs2