
# Chartio , Static chart generator for Laravel

Chartio, is a static chart generator for Laravel. Chartio generate chart by **`highchart.js`** and get screenshot from it by using **`spatie/browsershot`** .

![exported chart image](https://github.com/farshidrezaei/chartio/blob/main/doc/chartio.png)


please install and setup  **browsershot** by docs  in [here](https://github.com/spatie/browsershot).


in progress:
- [X] cloud chart
- [X] bar chart
- [X] column chart
- [X] line chart
- [X] pie chart
- [X] donut chart
- [X] abstract chart (customizable)


## Installation

### composer

```bash
composer require farshidrezaei/chartio
```

## Chartio environment
Set bellow config to `.env` file  with your installed node and npm path
```dotenv  
NODE_PATH=
NPM_PATH=
```  

## Customization

for publish config file:
```bash
php artisan vendor:publish --provider="FarshidRezaei\Chartio\Providers\ChartioServiceProvider" --tag="config"
```

for publish view files :
```bash
php artisan vendor:publish --provider="FarshidRezaei\Chartio\Providers\ChartioServiceProvider" --tag="views"
```


## Usage
Here's a quick example:

```php
use FarshidRezaei\Chartio\Services\Chartio;

$data = [  
 ['title'=>'foo','count'=>1234],  
  ['title'=>'bar','count'=>5475],  
  ['title'=>'baz','count'=>452],  
  ['title'=>'don','count'=>1457],  
  ['title'=>'shi','count'=>2458],  
  ['title'=>'iran','count'=>3115],  
  ['title'=>'persian','count'=>455],  
  ['title'=>'farshid','count'=>5126],  
  ['title'=>'lifeweb','count'=>1111],  
];  
  
  
$imagePath= Chartio::make( 'cloud' )  
 ->rtl()
 ->color('#13b6b9')
 ->colorSet([ "#009299", "#1AD7DB", "#589DFB", "#5EDFFF", "#B7E778" ])
 ->title('Chartio Example')  
 ->description('This is Chartio Example')  
 ->xAxisField( 'title' )  
 ->yAxisField( 'count' )  
 ->data( $data )  
 ->generate()  
 ->save( Storage::path( 'chartio-example.png' ) );
 
 ```
then  file will save in your entered path.

![exported chart image](https://github.com/farshidrezaei/chartio/blob/main/doc/example.png)

-----------------

## Data Sample for each chart


### bar:
```php

 $data = [
            'labels' => [ '1999', '2000', '2005' ],
            'series' => [
                [
                    'title' => 'foo',
                    'data'  => [ 10, 5, 30 ],
                ],
                [
                    'title' => 'bar',
                    'data'  => [ 15, 26, 5 ],
                ],
            ],
        ];
$imagePath= Chartio::make( 'bar' )  
 ->rtl()
 ->color('#13b6b9')
 ->colorSet([ "#009299", "#1AD7DB", "#589DFB", "#5EDFFF", "#B7E778" ])
 ->title('Chartio Example')  
 ->description('This is Chartio Example')   
 ->data( $data )  
 ->generate()  
 ->save( Storage::path( 'chartio-example.png' ) );
 
```
export example:

![exported chart image](https://github.com/farshidrezaei/chartio/blob/main/doc/bar.png)

### column:
```php
 $data = [
            'labels' => [ '1999', '2000', '2005' ],
            'series' => [
                [
                    'title' => 'foo',
                    'data'  => [ 10, 5, 30 ],
                ],
                [
                    'title' => 'bar',
                    'data'  => [ 15, 26, 5 ],
                ],
            ],
        ];
$imagePath= Chartio::make( 'column' )  
 ->rtl()
 ->color('#13b6b9')
 ->colorSet([ "#009299", "#1AD7DB", "#589DFB", "#5EDFFF", "#B7E778" ])
 ->title('Chartio Example')  
 ->description('This is Chartio Example')   
 ->data( $data )  
 ->generate()  
 ->save( Storage::path( 'chartio-example.png' ) );
 
```
export example:

![exported chart image](https://github.com/farshidrezaei/chartio/blob/main/doc/column.png)


 ### line:
```php
 $data = [
            'labels' => [ '1999', '2000', '2005' ],
            'series' => [
                [
                    'title' => 'foo',
                    'data'  => [ 10, 5, 30 ],
                ],
                [
                    'title' => 'bar',
                    'data'  => [ 15, 26, 5 ],
                ],
            ],
        ];
$imagePath= Chartio::make( 'line' )  
 ->rtl()
 ->color('#13b6b9')
 ->colorSet([ "#009299", "#1AD7DB", "#589DFB", "#5EDFFF", "#B7E778" ])
 ->title('Chartio Example')  
 ->description('This is Chartio Example')   
 ->data( $data )  
 ->generate()  
 ->save( Storage::path( 'chartio-example.png' ) );
 
```
export example:

![exported chart image](https://github.com/farshidrezaei/chartio/blob/main/doc/line.png)



### pie:
```php
   $data = [
            ['title'=>'foo','count'=>1234],
            ['title'=>'bar','count'=>125],
            ['title'=>'baz','count'=>564],
        ];
$imagePath= Chartio::make( 'pie' )  
 ->rtl()
 ->color('#13b6b9')
 ->colorSet([ "#009299", "#1AD7DB", "#589DFB", "#5EDFFF", "#B7E778" ])
 ->title('Chartio Example')  
 ->description('This is Chartio Example')   
  ->xAxisField( 'title' )  
 ->yAxisField( 'count' )  
 ->data( $data )  
 ->generate()  
 ->save( Storage::path( 'chartio-example.png' ) );
 
```
export example:

![exported chart image](https://github.com/farshidrezaei/chartio/blob/main/doc/pie.png)

### donut:
```php
   $data = [
            ['title'=>'foo','count'=>1234],
            ['title'=>'bar','count'=>125],
            ['title'=>'baz','count'=>564],
        ];
$imagePath= Chartio::make( 'donut' )  
 ->rtl()
 ->color('#13b6b9')
 ->colorSet([ "#009299", "#1AD7DB", "#589DFB", "#5EDFFF", "#B7E778" ])
 ->title('Chartio Example')  
 ->description('This is Chartio Example')   
  ->xAxisField( 'title' )  
 ->yAxisField( 'count' )  
 ->data( $data )  
 ->generate()  
 ->save( Storage::path( 'chartio-example.png' ) );
```
export example:

![exported chart image](https://github.com/farshidrezaei/chartio/blob/main/doc/donut.png)



### cloud:
```php
$data = [  
 ['title'=>'foo','count'=>1234],  
  ['title'=>'bar','count'=>5475],  
  ['title'=>'baz','count'=>452],  
];  
$imagePath= Chartio::make( 'cloud' )  
 ->rtl()
 ->color('#13b6b9')
 ->colorSet([ "#009299", "#1AD7DB", "#589DFB", "#5EDFFF", "#B7E778" ])
 ->title('Chartio Example')  
 ->description('This is Chartio Example')   
  ->xAxisField( 'title' )  
 ->yAxisField( 'count' )  
 ->data( $data )  
 ->generate()  
 ->save( Storage::path( 'chartio-example.png' ) );
```
export example:

![exported chart image](https://github.com/farshidrezaei/chartio/blob/main/doc/cloud.png)

### abstract:
```php
$imagePath = Chartio::make( 'abstract' )
            ->rtl()
            ->title( 'Chartio Example' )
            ->description( 'This is Chartio Example' )
            ->chartOptions(
                [
                    'chart' => [
                        'type' => 'arearange',
                        'zoomType' => 'x',
                        'scrollablePlotArea' => [
                            'minWidth' => 600,
                            'scrollPositionX' => 1,
                        ],
                    ],

                    'credits' => [
                        'enabled' => false,
                    ],

                    'title' => [
                        'text' => 'Temperature variation by day',
                    ],

                    'xAxis' => [
                        'type' => 'datetime',
                        'accessibility' => [
                            'rangeDescription' => 'Range: Jan 1st 2017 to Dec 31 2017.',
                        ],
                    ],

                    'yAxis' => [
                        'title' => [
                            'text' => null,
                        ],
                    ],

                    'tooltip' => [
                        'crosshairs' => true,
                        'shared' => true,
                        'valueSuffix' => '°C',
                        'xDateFormat' => '%A, %b %e',
                    ],

                    'legend' => [
                        'enabled' => false,
                    ],

                    'series' => [
                        [
                            'name' => 'Temperatures',
                            'data' => [
                                [
                                    1483232400000,
                                    1.4,
                                    4.7,
                                ],
                                [
                                    1483318800000,
                                    -1.3,
                                    1.9,
                                ],
                                [
                                    1483405200000,
                                    -0.7,
                                    4.3,
                                ],
                                [
                                    1483491600000,
                                    -5.5,
                                    3.2,
                                ],
                            ],
                        ],
                    ],
                ]
            )
            ->generate()
            ->save( Storage::path( 'chartio-example.png' ) );
```
export example:

![exported chart image](https://github.com/farshidrezaei/chartio/blob/main/doc/abstract.png)



## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
