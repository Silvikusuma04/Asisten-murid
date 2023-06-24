<?php
function asistenBelajarAI($pertanyaan) {
    $openai_key = 'sk-fGubckvcpS64ibRVHtBxT3BlbkFJqBR7dZhwwXgdHPjEfIXPmkdir/varm';

    $endpoint = 'https://api.openai.com/v1/engines/gpt-3.5-turbo/completions';
    $url = $endpoint;

    $data = array(
        'prompt' => 'You are a helpful assistant that provides learning support.\nQ: ' . $pertanyaan,
        'max_tokens' => 50,
        'temperature' => 1.0,
        'n' => 1,
        'stop' => '\n'
    );
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $openai_key
    );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        return 'Error: ' . $error;
    } else {
        $result = json_decode($response, true);
        if (isset($result['choices']) && !empty($result['choices'])) {
            $jawaban = $result['choices'][0]['text'];
            curl_close($ch);
            return $jawaban;
        } else {
            curl_close($ch);
            return 'Error: Invalid response from the model.';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pertanyaan = $_POST['pertanyaan'];
    $jawaban = asistenBelajarAI($pertanyaan);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asisten Belajar AI</title>
    <style>
        .chat-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .chat-container h1 {
            text-align: center;
        }

        .chat-container .chat-log {
            height: 400px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .chat-container .user-message {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <h1>Asisten Belajar AI</h1>
        <div class="chat-log">
        </div>
        <form method="post" action="">
            <input type="text" name="pertanyaan" placeholder="Ketik pertanyaan di sini" required autofocus>
            <button type="submit">Tanyakan</button>
        </form>
        <?php if (isset($jawaban)) : ?>
            <div class="user-message">
                <strong>Pertanyaan:</strong> <?php echo $pertanyaan; ?>
            </div>
            <div class="user-message">
                <strong>Jawaban:</strong> <?php echo $jawaban; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
