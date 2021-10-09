
# Chartio , Static chart generator for Laravel

Chartio, an static chart generator for Laravel. Chartio generate chart and get screenshot from it by using **`spatie/browsershot`** .

please install and setup  **browsershot** by docs  in [here](https://github.com/spatie/browsershot).

in progress:
- [X] cloud chart
- [ ] bar chart
- [ ] line chart
- [ ] pie chart
- [ ] donut chart

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
![exported chart image](https://s4.uupload.ir/files/chartio-example_4hp0.png)


##Customization

for publish config file:
```bash
php artisan vendor:publish --provider="FarshidRezaei\Chartio\Providers\ChartioServiceProvider" --tag="config"
```

for publish view files :
```bash
php artisan vendor:publish --provider="FarshidRezaei\Chartio\Providers\ChartioServiceProvider" --tag="views"
```
