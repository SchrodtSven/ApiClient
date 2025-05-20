# ApiClient

Tiny library for consuming (mainly HTTP based) APIs for PHP 8.4+ 
- FE+BE (ECMAScript based)

## Sub namespace PHalfAsleep

Will be moved to PHibernate

## Caching 


## Supported APIs (out-of-the-box)

### Marvel.com 
Data provided by Marvel. © 2024 MARVEL

You will need an individual pair (private and public) of keys to access the 
API endpoints. (Consult https://developer.marvel.com/signup - for further information)

## Notes to myself

--> every single line of code, that produces <code>source code</code> will resist within sub namespace 
<code>PHalfAsleep</code>, that will be extended to <code>Phibernate</code> project


### Parser iterators

namespace SchrodtSven\ApiClient\Text\Parser;
``` php
interface Iterator
{
    public function __construct(private ParserInterface $parser, 
                                private RuleSet $ruleSet);

    public function walk(): mixed;                                
}
```







###  Metron.cloud

## Including addition APIs

## Prerequisities

ApiClient/App/Provider/{PROVIDER_NAME}
    - Endpoints.php
    - Parser.php
    - UriBuilder.php
    - Entity<directory>
    
Write your own provider manually or use <code>SchrodtSven\ApiClient\Tools\ProviderAssistant</code>