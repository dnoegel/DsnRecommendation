<?php

namespace DsnRecommendation\Components\DemoData;

use Shopware\Components\Api\Resource\Article;

class Items
{
    const BASE_PATH = 'file://' . __DIR__ . '../../../assets/demo/images/';
    protected $items = [
        [
            '__options_images' => ['replace' => true],
            'name' => 'console',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Gaming console manufacturer',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Digital'],
                ['path' => 'English|Gaming|Digital'],
            ],
            'mainDetail' => [
                'number' => 'demo1',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 500]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'Ricardo-Zeebo-Marca-retirada-por-quest-o-de-copyright.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'console controller',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Gaming console manufacturer',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Digital'],
                ['path' => 'English|Gaming|Digital'],
            ],
            'mainDetail' => [
                'number' => 'demo2',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 400]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'console-controller2.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'console game: Tomb Finder',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Gaming console manufacturer',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Digital'],
                ['path' => 'English|Gaming|Digital'],
            ],
            'mainDetail' => [
                'number' => 'demo3',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 300]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'label-cd-dvd.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'console game: Kickboxer 2000',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Gaming console manufacturer',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Digital'],
                ['path' => 'English|Gaming|Digital'],
            ],
            'mainDetail' => [
                'number' => 'demo4',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 200]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'fighters.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'console game: Racing 2000',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Gaming console manufacturer',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Digital'],
                ['path' => 'English|Gaming|Digital'],
            ],
            'mainDetail' => [
                'number' => 'demo5',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 100]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'SimpleBlueCarTopView.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'console game: Racing 3000',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Gaming console manufacturer',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Digital'],
                ['path' => 'English|Gaming|Digital'],
            ],
            'mainDetail' => [
                'number' => 'demo6',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 100]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'SimpleBrightGreenCarTopView.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'console game: Racing 4000',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Gaming console manufacturer',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Digital'],
                ['path' => 'English|Gaming|Digital'],
            ],
            'mainDetail' => [
                'number' => 'demo7',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 100]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'SimpleYellowCarTopView.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'board game: Chess',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'BoardGame Premium',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Analog'],
                ['path' => 'English|Gaming|Analog'],
            ],
            'mainDetail' => [
                'number' => 'demo8',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'Fancy-Chess-Board-And-Pieces.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'board game: Go',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'BoardGame Premium',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Analog'],
                ['path' => 'English|Gaming|Analog'],
            ],
            'mainDetail' => [
                'number' => 'demo9',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'go-game2.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'board game: Checkers',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'BoardGame Premium',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Analog'],
                ['path' => 'English|Gaming|Analog'],
            ],
            'mainDetail' => [
                'number' => 'demo10',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'chinese-checkers.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'board game: Crossword',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'BoardGame Premium',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Analog'],
                ['path' => 'English|Gaming|Analog'],
            ],
            'mainDetail' => [
                'number' => 'demo11',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'letter-tiles1.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'card game: Bingo',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'CardGame Premium',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Analog'],
                ['path' => 'English|Gaming|Analog'],
            ],
            'mainDetail' => [
                'number' => 'demo12',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'bingo-cards.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'card game: Poker - Royal',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'CardGame Premium',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Analog'],
                ['path' => 'English|Gaming|Analog'],
            ],
            'mainDetail' => [
                'number' => 'demo13',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'royalflush.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'card game: Doppelkopf',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'CardGame Premium',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Analog'],
                ['path' => 'English|Gaming|Analog'],
            ],
            'mainDetail' => [
                'number' => 'demo14',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'nicubunu-Card-backs-cards-blue.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'other games: Domino',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Various games Inc',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Analog'],
                ['path' => 'English|Gaming|Analog'],
            ],
            'mainDetail' => [
                'number' => 'demo15',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'dominos.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'other games: Fun with dices',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Various games Inc',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Analog'],
                ['path' => 'English|Gaming|Analog'],
            ],
            'mainDetail' => [
                'number' => 'demo16',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'jeronimo-dice-11.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'other games: Fun with flags',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Various games Inc',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Analog'],
                ['path' => 'English|Gaming|Analog'],
            ],
            'mainDetail' => [
                'number' => 'demo17',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'Anonymous-globe-of-flags-1.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'outdoor game: rope jumping',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Outdoor games Inc',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Outdoor'],
                ['path' => 'English|Gaming|Outdoor'],
            ],
            'mainDetail' => [
                'number' => 'demo18',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'johnny-automatic-Jumping-rope.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'outdoor game: paintball',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Outdoor games Inc',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Outdoor'],
                ['path' => 'English|Gaming|Outdoor'],
            ],
            'mainDetail' => [
                'number' => 'demo19',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'paintball.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'outdoor game: golf pro',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Outdoor games Inc',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Outdoor'],
                ['path' => 'English|Gaming|Outdoor'],
            ],
            'mainDetail' => [
                'number' => 'demo20',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . '13-Hotel-Icon-Near-Golf.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'outdoor game: soccer',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Outdoor games Inc',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Outdoor'],
                ['path' => 'English|Gaming|Outdoor'],
            ],
            'mainDetail' => [
                'number' => 'demo21',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'sam-uy-futbolista-soccer-player.png'),
            ),
        ],
        [
            '__options_images' => ['replace' => true],
            'name' => 'outdoor game: water fight',
            'tax' => 19,
            'active' => 1,
            'supplier' => 'Outdoor games Inc',
            'categories' => [
                ['path' => 'Deutsch|Gaming|Outdoor'],
                ['path' => 'English|Gaming|Outdoor'],
            ],
            'mainDetail' => [
                'number' => 'demo22',
                'active' => 1,
                'prices' => [
                    ['customerGroupKey' => 'EK', 'price' => 33]
                ]
            ],
            'images' => array(
                array('link' => self::BASE_PATH . 'Gerald-G-Water-Fight-1.png'),
            ),
        ]
    ];


    /**
     * @var
     */
    private $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function create()
    {
        foreach ($this->items as &$item) {
            $item['descriptionLong'] = $item['mainDetail']['number'];
        }

        $this->article->setResultMode(Article::HYDRATE_ARRAY);
        $result = $this->article->batch($this->items);
    }
}
