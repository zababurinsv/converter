# converter

'modules' => [
        'converter' => [
            'class' => 'backend\modules\converter\Converter',
        ],
    ],
    
    
        public function actionConvert()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://lambda.szababurinv.now.sh')
            ->setData([

                    'name' => 'John Doe',
                    'email' => 'johndoe@example.com'
            ])
            ->send();
        if ($response->isOk) {

        }

        return $this->redirect(['index']);
    }
    
    
