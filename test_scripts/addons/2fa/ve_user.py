import requests

url = "http://localhost/jwtauthpanelw2fa/2fa/verify"
token = "YOUR_JWT_TOKEN"

headers = {
    "Authorization": f"Bearer {token}",
    "Content-Type": "application/json"
}

inputCode = input('Please type your code of Google Authenticator: ')
data = {
    "code": int(inputCode)
}

response = requests.post(url, headers=headers, json=data)

print(response.status_code)
print(response.json())
