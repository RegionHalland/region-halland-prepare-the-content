# Preparera "the_content" med id och slug

## Hur man använder Region Hallands plugin "region-halland-prepare-the-content"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-prepare-the-content".


## Användningsområde

Denna plugin lägger till id och slug för alla h2, h3 och h4-rubriker.
Detta kan vara användbart om man exempelvis vill bygga en "hitta-på-sidan".


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell via den medföljande filen:
```sh
LICENSE (https://github.com/RegionHalland/region-halland-prepare-the-content/blob/master/LICENSE)
```

## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-prepare-the-content.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-prepare-the-content.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-prepare-the-content": "1.0.0"
},
```


## Hur man använder "region-halland-prepare-the-content" på en sida via "Blade"

```sh
@if(function_exists('get_region_halland_prepare_the_content'))
	@php(get_region_halland_prepare_the_content())
@endif
<article class="article">
	{!! the_content() !!}
</article>				
```


## Detta skapar då id med slug inuti "the_content" enligt:

```sh
<h2 id="lorem-ipsum">Lorem ipsum</h2>
<h3 id="lorem-ipsum-dolares">Lorem ipsum dolares</h3>
<h4 id="lorem-integer-metus">Lorem integer metus</h4>
```


## Versionhistorik

### 1.1.0
- Uppdaterat med information om licensmodell
- Bifogat fil med licensmodell

### 1.0.0
- Första version
