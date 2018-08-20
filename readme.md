# Readme for EFT80
To generate an EFT there are a few details that are required from your bank account:

* CPA
* OriginatorName
* Institution
* Transit
* Account

``` php
$eft = new EFT();

$eft->initialize([
    'originatorId' => 'fklssasdfa',
    'transactionType' => 'C',
    'cpa' => '123',
    'dueDate' => '140618', //ddmmyy
    'originatorName' => 'INCORPORATED INC.',
    'institutionTransit' => '000412345',
    'account' => '12345678910 ',
    'fileCreationNumber' => '1',
]);

foreach (range(0, rand(5, 50)) as $i) {
    $eft->addDetail(new Detail([
        'name' => 'This is a test',
        'referenceNumber' => 'INV-1808-' . str_pad(rand(0, 999999), 6, "0", STR_PAD_LEFT),
        'institutionTransit' => '000412345',
        'account' => rand(5, 99999999),
        'amount' => rand(0, 99999999),
    ]));
}

$eft->finalize();

echo "<pre>{$eft->export()}";
```