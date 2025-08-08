import requests

url = "http://localhost/jwtauthpanelw2fa/login"
data = {
    "email": "teszt@example.com",
    "password": "jelszo123"
}

response = requests.post(url, json=data)

if response.status_code == 200:
    json_data = response.json()
    print("Success Login! JWT token:")
    print(json_data.get("token"))
else:
    print(f"Error: {response.status_code}")
    print(response.text)
