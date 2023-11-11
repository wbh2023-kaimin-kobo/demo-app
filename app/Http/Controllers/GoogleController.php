<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;

class GoogleController extends Controller
{
    public function index()
    {
        // Authenticating with keyfile data.
    $textToSpeechClient = new TextToSpeechClient([
        'credentials' => json_decode(file_get_contents(config_path('google.json')), true)
    ]);
    
    $input = new SynthesisInput();
    $input->setText('Japan\'s national soccer team won against Colombia!');
    $voice = new VoiceSelectionParams();
    $voice->setLanguageCode('en-US');
    $audioConfig = new AudioConfig();
    $audioConfig->setAudioEncoding(AudioEncoding::MP3);

    $resp = $textToSpeechClient->synthesizeSpeech($input, $voice, $audioConfig);
    file_put_contents('test.mp3', $resp->getAudioContent());
    }
}
