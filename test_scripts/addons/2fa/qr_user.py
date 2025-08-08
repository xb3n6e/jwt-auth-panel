import requests

url = "http://localhost/jwtauthpanelw2fa/2fa/qrcode"
token = "YOUR_JWT_TOKEN"

headers = {
    "Authorization": f"Bearer {token}"
}

response = requests.get(url, headers=headers)

if response.status_code == 200:
    with open("qrcode.png", "wb") as f:
        f.write(response.content)
    print("QR Code has saved as: qrcode.png")
else:
    print("Error:", response.status_code)
    print(response.text)