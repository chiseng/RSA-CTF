from Crypto.PublicKey import RSA
import base64
f=open('encrypted.txt', 'rb')
message=base64.b64decode(f.read())
private_key = RSA.importKey(open("priv.pem").read())
text=private_key.decrypt(message)
print(text.decode('utf-8'))
