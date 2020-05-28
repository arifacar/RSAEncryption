# RSA Encryption with PHP

A simple data encryption application with rest service written in Php using openssl_public_encrypt and openssl_private_decrypt. 

- **openssl_public_encrypt()** encrypts data with public key and stores the result into crypted. Encrypted data can be decrypted via openssl_private_decrypt(). This function can be used e.g. to encrypt message which can be then read only by owner of the private key. It can be also used to store secure data in database.
                                                                                                                                                            
- **openssl_private_decrypt()** decrypts data that was previously encrypted via openssl_public_encrypt() and stores the result into decrypted. You can use this function e.g. to decrypt data which is supposed to only be available to you.

For more information: https://www.php.net/manual/en/ref.openssl.php

The collections allows you to test encrypt and decrypt Rest APIs from within Postman. Import RSAEncryption.postman_collection.json file to your Postman (Collection v2.1)

## Test Service

### Encrypt Service
request: 

    {
        "data": "Hello world, this is a test!"
    }
    
response: 
    
    {
        "response": "lkXXWUnKbwhcKNkN82IregUOTsQzPntPYJvliLFfTWUbES3HIrllCFHhLcST9VxSuH0diZonda5HolNRRSot/njeEspAoHu45Id+6iES8YofuIDa6eBHKiUsL90Y5JLL308vctL5INhCU627BJHC8Omj6/GmF4GvscLHZqASu1E="
    }
    
### Decrypt Service
    
request:

    {
        "data": "lkXXWUnKbwhcKNkN82IregUOTsQzPntPYJvliLFfTWUbES3HIrllCFHhLcST9VxSuH0diZonda5HolNRRSot/njeEspAoHu45Id+6iES8YofuIDa6eBHKiUsL90Y5JLL308vctL5INhCU627BJHC8Omj6/GmF4GvscLHZqASu1E="
    }    
    
response: 

    {
        "response": "Hello world, this is a test!"
    }
