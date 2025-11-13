<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NetflixController extends Controller
{

    public function index()
    {
        $featuredMovie = [
            'title' => 'Stranger Things',
            'description' => 'Uma série sobrenatural que se passa nos anos 80, onde um grupo de crianças enfrenta criaturas de outra dimensão enquanto procuram por seu amigo desaparecido.',
            'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
            'rating' => '97% Match',
            'year' => '2016',
            'duration' => '4 Temporadas',
            'genre' => 'Ficção Científica, Terror, Drama'
        ];

        $categories = [
            [
                'title' => 'Tendências Agora',
                'movies' => [
                    [
                        'id' => 1,
                        'title' => 'The Witcher',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '94% Match',
                        'year' => '2019',
                        'duration' => '3 Temporadas',
                        'genre' => 'Fantasia, Aventura',
                        'description' => 'Geralt de Rivia, um bruxo caçador de monstros, luta para encontrar seu lugar em um mundo onde as pessoas muitas vezes se mostram mais perversas que as criaturas selvagens.'
                    ],
                    [
                        'id' => 2,
                        'title' => 'Dark',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '95% Match',
                        'year' => '2017',
                        'duration' => '3 Temporadas',
                        'genre' => 'Ficção Científica, Mistério',
                        'description' => 'Um thriller sobrenatural que explora as consequências não intencionais de viagens no tempo através de múltiplas gerações de famílias.'
                    ],
                    [
                        'id' => 3,
                        'title' => 'Money Heist',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '92% Match',
                        'year' => '2017',
                        'duration' => '5 Temporadas',
                        'genre' => 'Crime, Drama, Suspense',
                        'description' => 'Um grupo de ladrões únicos realiza o maior assalto da história na Casa da Moeda Real da Espanha.'
                    ],
                    [
                        'id' => 4,
                        'title' => 'Bridgerton',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '88% Match',
                        'year' => '2020',
                        'duration' => '2 Temporadas',
                        'genre' => 'Romance, Drama',
                        'description' => 'Ambientada na Londres da era Regência, a série segue a família Bridgerton enquanto navegam pela alta sociedade.'
                    ],
                    [
                        'id' => 5,
                        'title' => 'The Crown',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '96% Match',
                        'year' => '2016',
                        'duration' => '6 Temporadas',
                        'genre' => 'Drama, História',
                        'description' => 'Uma biografização dos reinados políticos e romances pessoais da Rainha Elizabeth II.'
                    ],
                    [
                        'id' => 6,
                        'title' => 'Ozark',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '93% Match',
                        'year' => '2017',
                        'duration' => '4 Temporadas',
                        'genre' => 'Crime, Drama, Suspense',
                        'description' => 'Um consultor financeiro se muda com a família para as montanhas Ozark no Missouri para lavar dinheiro para um cartel de drogas mexicano.'
                    ]
                ]
            ],
            [
                'title' => 'Ação e Aventura',
                'movies' => [
                    [
                        'id' => 7,
                        'title' => 'John Wick',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '89% Match',
                        'year' => '2014',
                        'duration' => '1h 41min',
                        'genre' => 'Ação, Crime, Suspense',
                        'description' => 'Um ex-assassino sai da aposentadoria para rastrear os gângsters que mataram seu cachorro e roubaram seu carro.'
                    ],
                    [
                        'id' => 8,
                        'title' => 'Mad Max: Fury Road',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '97% Match',
                        'year' => '2015',
                        'duration' => '2h 0min',
                        'genre' => 'Ação, Aventura, Ficção Científica',
                        'description' => 'Em um mundo pós-apocalíptico, Max se une à rebelde Furiosa para fugir de um senhor da guerra tirano.'
                    ],
                    [
                        'id' => 9,
                        'title' => 'Extraction',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '88% Match',
                        'year' => '2020',
                        'duration' => '1h 56min',
                        'genre' => 'Ação, Suspense',
                        'description' => 'Um mercenário é contratado para resgatar o filho sequestrado de um senhor do crime internacional.'
                    ],
                    [
                        'id' => 10,
                        'title' => '6 Underground',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '76% Match',
                        'year' => '2019',
                        'duration' => '2h 8min',
                        'genre' => 'Ação, Comédia, Suspense',
                        'description' => 'Seis indivíduos de diferentes partes do mundo são unidos por um misterioso líder para uma missão.'
                    ],
                    [
                        'id' => 11,
                        'title' => 'The Old Guard',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '85% Match',
                        'year' => '2020',
                        'duration' => '2h 5min',
                        'genre' => 'Ação, Fantasia, Suspense',
                        'description' => 'Um grupo de mercenários imortais deve lutar para manter sua identidade secreta quando descobertos.'
                    ],
                    [
                        'id' => 12,
                        'title' => 'Triple Frontier',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '82% Match',
                        'year' => '2019',
                        'duration' => '2h 5min',
                        'genre' => 'Ação, Drama, Suspense',
                        'description' => 'Ex-soldados das Forças Especiais se reúnem para planejar um assalto contra um chefe do crime sul-americano.'
                    ]
                ]
            ],
            [
                'title' => 'Comédia',
                'movies' => [
                    [
                        'id' => 13,
                        'title' => 'The Good Place',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '94% Match',
                        'year' => '2016',
                        'duration' => '4 Temporadas',
                        'genre' => 'Comédia, Fantasia',
                        'description' => 'Uma mulher descobre que foi enviada por engano para o "lugar bom" após sua morte e tenta se tornar uma pessoa melhor.'
                    ],
                    [
                        'id' => 14,
                        'title' => 'Brooklyn Nine-Nine',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '92% Match',
                        'year' => '2013',
                        'duration' => '8 Temporadas',
                        'genre' => 'Comédia, Crime',
                        'description' => 'Uma sitcom que segue um grupo de detetives em um distrito policial do Brooklyn.'
                    ],
                    [
                        'id' => 15,
                        'title' => 'Schitt\'s Creek',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '96% Match',
                        'year' => '2015',
                        'duration' => '6 Temporadas',
                        'genre' => 'Comédia',
                        'description' => 'Uma família rica perde tudo e é forçada a viver em uma pequena cidade que compraram como brincadeira.'
                    ],
                    [
                        'id' => 16,
                        'title' => 'Space Force',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '78% Match',
                        'year' => '2020',
                        'duration' => '2 Temporadas',
                        'genre' => 'Comédia',
                        'description' => 'Um general é encarregado de liderar a nova divisão militar espacial dos Estados Unidos.'
                    ],
                    [
                        'id' => 17,
                        'title' => 'Dead to Me',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '91% Match',
                        'year' => '2019',
                        'duration' => '3 Temporadas',
                        'genre' => 'Comédia, Crime, Drama',
                        'description' => 'Uma viúva enlutada forma uma amizade improvável com uma mulher otimista que tem um segredo sombrio.'
                    ],
                    [
                        'id' => 18,
                        'title' => 'Russian Doll',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '89% Match',
                        'year' => '2019',
                        'duration' => '2 Temporadas',
                        'genre' => 'Comédia, Drama, Mistério',
                        'description' => 'Uma jovem fica presa em um loop temporal, morrendo repetidamente na noite de seu aniversário de 36 anos.'
                    ]
                ]
            ],
            [
                'title' => 'Terror',
                'movies' => [
                    [
                        'id' => 19,
                        'title' => 'The Haunting of Hill House',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '93% Match',
                        'year' => '2018',
                        'duration' => '1 Temporada',
                        'genre' => 'Terror, Drama',
                        'description' => 'Uma família é assombrada por eventos traumáticos de sua infância passada em Hill House.'
                    ],
                    [
                        'id' => 20,
                        'title' => 'Midnight Mass',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '87% Match',
                        'year' => '2021',
                        'duration' => '1 Temporada',
                        'genre' => 'Terror, Sobrenatural',
                        'description' => 'Uma pequena comunidade insular experimenta eventos milagrosos e assombrados após a chegada de um padre carismático.'
                    ],
                    [
                        'id' => 21,
                        'title' => 'Bird Box',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '78% Match',
                        'year' => '2018',
                        'duration' => '2h 4min',
                        'genre' => 'Terror, Suspense, Ficção Científica',
                        'description' => 'Uma mulher e duas crianças fazem uma perigosa jornada às cegas para encontrar segurança.'
                    ],
                    [
                        'id' => 22,
                        'title' => 'His House',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '91% Match',
                        'year' => '2020',
                        'duration' => '1h 33min',
                        'genre' => 'Terror, Drama',
                        'description' => 'Um casal de refugiados tenta reconstruir suas vidas, mas descobrem que algo sinistro vive em sua nova casa.'
                    ],
                    [
                        'id' => 23,
                        'title' => 'Cam',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '84% Match',
                        'year' => '2018',
                        'duration' => '1h 34min',
                        'genre' => 'Terror, Mistério, Suspense',
                        'description' => 'Uma camgirl descobre que sua identidade foi roubada por uma réplica exata de si mesma.'
                    ],
                    [
                        'id' => 24,
                        'title' => 'In the Tall Grass',
                        'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                        'rating' => '75% Match',
                        'year' => '2019',
                        'duration' => '1h 41min',
                        'genre' => 'Terror, Ficção Científica',
                        'description' => 'Um irmão e uma irmã entram em um campo de grama alta para resgatar um menino, mas logo descobrem que não conseguem sair.'
                    ]
                ]
            ]
        ];

        return view('netflix', compact('featuredMovie', 'categories'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        
        // Simulação de busca nos dados mocados
        $results = [];
        
        if (!empty($query)) {
            $results = [
                [
                    'id' => 'search_1',
                    'title' => 'Resultado para: ' . $query,
                    'description' => 'Este é um resultado de busca simulado.',
                    'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
                    'rating' => '85% Match',
                    'year' => '2023',
                    'duration' => '1h 45min',
                    'genre' => 'Drama'
                ]
            ];
        }

        return response()->json(['results' => $results]);
    }

    public function movie($id)
    {
        // Retorna detalhes mocados de um filme
        $movie = [
            'id' => $id,
            'title' => 'Filme Detalhado',
            'description' => 'Esta é a descrição detalhada do filme selecionado.',
            'image' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400&h=225&fit=crop',
            'rating' => '90% Match',
            'year' => '2023',
            'duration' => '2h 15min',
            'genre' => 'Drama, Ação',
            'director' => 'Diretor Exemplo',
            'cast' => ['Ator 1', 'Ator 2', 'Ator 3']
        ];

        return response()->json($movie);
    }
}
