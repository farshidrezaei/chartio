
# Chartio , Static chart generator for Laravel

Chartio, is a static chart generator for Laravel. Chartio generate chart by **`highchart.js`** and get screenshot from it by using **`spatie/browsershot`** .

![exported chart image](https://s4.uupload.ir/files/new_project_vqtf.png)


please install and setup  **browsershot** by docs  in [here](https://github.com/spatie/browsershot).


in progress:
- [X] cloud chart
- [X] bar chart
- [X] column chart
- [X] line chart
- [X] pie chart
- [X] donut chart

## Chartio environment
Set bellow config to `.env` file  with your installed node and npm path
```dotenv  
NODE_PATH=
NPM_PATH=
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
  
  
return Chartio::make( 'cloud' )  
 ->title('Chartio Example')  
 ->description('This is Chartio Example')  
 ->xAxisField( 'title' )  
 ->yAxisField( 'count' )  
 ->data( $data )  
 ->generate()  
 ->save( Storage::path( 'chartio-example.png' ) );
 
 ```
then  file will save in your entered path.

![exported chart image](https://s4.uupload.ir/files/chartio-example_wmr.png)

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
```
export example:

![exported chart image](https://s4.uupload.ir/files/bar_hms.png)

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
```
export example:

![exported chart image](https://s4.uupload.ir/files/column_aamm.png)


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
```
export example:

![exported chart image](https://s4.uupload.ir/files/line_y6mz.png)



### pie:
```php
   $data = [
            ['title'=>'foo','count'=>1234],
            ['title'=>'bar','count'=>125],
            ['title'=>'baz','count'=>564],
        ];
```
export example:

![exported chart image](https://s4.uupload.ir/files/pie_qrst.png)

### donut:
```php
   $data = [
            ['title'=>'foo','count'=>1234],
            ['title'=>'bar','count'=>125],
            ['title'=>'baz','count'=>564],
        ];
```
export example:

![exported chart image](https://s4.uupload.ir/files/donut_m42h.png)



### cloud:
```php
$data = [  
 ['title'=>'foo','count'=>1234],  
  ['title'=>'bar','count'=>5475],  
  ['title'=>'baz','count'=>452],  
];  
```
export example:

![exported chart image](https://s4.uupload.ir/files/cloud_ohlo.png)


-----------
## Customization

for publish config file:
```bash
php artisan vendor:publish --provider="FarshidRezaei\Chartio\Providers\ChartioServiceProvider" --tag="config"
```

for publish view files :
```bash
php artisan vendor:publish --provider="FarshidRezaei\Chartio\Providers\ChartioServiceProvider" --tag="views"
```
