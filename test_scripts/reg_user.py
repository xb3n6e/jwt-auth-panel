import requests

url = 'http://localhost/jwtauthpanelw2fa/register'
data = {
    "email": "teszt@example.com",
    "password": "jelszo123"
}

response = requests.post(url, json=data)
print(response.text)
