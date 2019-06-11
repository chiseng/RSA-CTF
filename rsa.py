import Crypto
from Crypto.PublicKey import RSA
from Crypto import Random
import base64

text = '4H%kd6Wb'
encoded=text.encode()

modulus_length = 256*4 # use larger value in production
f=open('priv.pem', 'wb')
privatekey = RSA.generate(modulus_length, Random.new().read)
f.write(privatekey.exportKey())
publickey = privatekey.publickey()
encrypted_msg = publickey.encrypt(encoded, 32)[0]
encoded_encrypted_msg = base64.b64encode(encrypted_msg) 
print(encoded_encrypted_msg.decode('utf-8'))

