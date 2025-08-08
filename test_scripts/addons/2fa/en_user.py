import requests

url = "http://localhost/jwtauthpanelw2fa/2fa/enable"
token = "YOUR_JWT_TOKEN"

headers = {
    "Authorization": f"Bearer {token}"
}

response = requests.post(url, headers=headers)

print(response.status_code)
print(response.json())
