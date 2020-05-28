<?php

class MyEncryption
{

    // create your own Private Key from https://travistidwell.com/jsencrypt/demo/

    public $privateKey = '-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQCyLNbf8jtBlVTGjJZmiRzRhO1ybGKlZpvaL5VbBFTJCKypyc7k
pTtOuXRgCY+jYbZ4+OKHicvy9pE8qSqSzFOxXmGK00gziT+8lc0fpk8SLFeE/H1R
F+qjh1k4zmqmSRe576bcLGRAJW0NtSWS+/+VwQFyyUjRM67OjCh4huRaGwIDAQAB
AoGBAIIIUWUs7mwFpNImhhkc1ehe/7+zNCcMBJAui+zZ81qoNwLO4mxh3i+tDy6L
q8WMKVSOJxzNxwdxRTulJgnujuC6VuAFXhMvt6XhXkbxM/7+ry2WYQ8QgH0JpcKL
2eicoDHeypgw0K9ukQr8gwGnTGuFIJVi9rwPhfBUiQ8QX0/pAkEA3VNcxir7QZ8d
N6v05gq7bBa67Vdf/Y/UA+73g0xdbVxbi+HnOoyLoDbGV11bAnEYIpB7wve3Yu/+
wIZTWOLoRwJBAM4W2qzycMPJuG1z4ED13cL8u2gbZSwQF/JYO4PRt01hZyQW4BsJ
DDD77eXiDGeXQ6ZEE7MtY7WTmkC5zLUivY0CQQCrPV5gbMztnsAqXL8kZVVRcdy6
2YmJU4jEalXSnnkCrhyeg/A1mpxFH1wiKDbMEtiLlaJL3QFkaS9/oe5GrXjtAkBJ
JNtf3nwfQQzv69x/scOPXNu2y2JRDTUykhYtZtVD5XoR2PyZG9Dz4bZBjMUSTyF3
dVn4kfd9jnGE32zELRxRAkA4aBhNy7Et4wy2nMzYwOEFkUcA5lxV7Dbfcr/OxGly
yKKZkdfJ7KTkUEnApwLSh/nrYVYN40w8OrTjgP0IJJQ4
-----END RSA PRIVATE KEY-----';

    public function decrypt($data)
    {
        if (openssl_private_decrypt(base64_decode($data), $decrypted, $this->privateKey))
            $data = $decrypted;
        else
            $data = '';
        return $data;
    }

}

$test = new MyEncryption();

$entityBody = file_get_contents('php://input');
$entityBodyJson = json_decode($entityBody, true);

$data = $entityBodyJson["data"];

header('Content-Type: application/json');
echo "{ \"response\":\"" . $test->decrypt($data) . "\"}";

?>