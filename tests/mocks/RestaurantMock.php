<?php
namespace FeedMeNow\Mock;

class Restaurant
{
    public $testRestaurant;

    public function __construct()
    {
        $this->testRestaurant = [
            'id' => 'name-1',
            'name' => 'name1',
            'image_url' => 'imageUrl1',
            'is_claimed' => true,
            'is_closed' => false,
            'url' => 'Url1',
            'phone' => 'Phone1',
            'display_phone' => 'displayPhone1',
            'review_count' => 11,
            'price' => '$$',
            'salesTax' => 0.079,
            'rating' => 4.5,
            'coordinates' => [
                'latitude' => '33.77719',
                'longitude' => '-84.38912'
            ],
            'categories' => [
                [
                    'alias' => 'japanese',
                    'title' => 'Japanese'
                ],
                [
                    'alias' => 'korean',
                    'title' => 'Korean'
                ]
            ],
            'photos' => [
                "https://s3-media1.fl.yelpcdn.com/bphoto/SpaGdVA-QwFCRmc7v_cjTg/o.jpg",
                "https://s3-media2.fl.yelpcdn.com/bphoto/4K-4QCa0M40w1K78JhDRWg/o.jpg",
                "https://s3-media3.fl.yelpcdn.com/bphoto/jCeM78HiNIV_Ui6Fs0MM5Q/o.jpg"
            ],
            'hours' => [
                'open' => [
                    [
                        'is_overnight' => false,
                        'start' => "1100",
                        'end' => "2200",
                        'day' => 0
                    ],
                    [
                        'is_overnight' => false,
                        'start' => "1100",
                        'end' => "2200",
                        'day' => 1
                    ]
                ]
            ],
            'providers' => [
                [
                    'name' => 'doordash',
                    'url' => 'https://www.doordash.com/store/umma-s-house-restaurant-cafe-atlanta-127616/',
                    'delivery' => [
                        'fee' => 599,
                        'serviceFee' => 0.1,
                        'minimum' => 1000,
                        'estimate' => [
                            'min' => 26,
                            'max' => 46
                        ]
                    ]
                ]
            ]
        ];
    }
}
