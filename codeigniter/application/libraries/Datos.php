<?php

class Datos{
	
	private $api_key = 'AIzaSyBkMhu-tHnjKZTqET8iEeVYMbdldFbn7Cc';
	private $channelId = 'UCFDTPtTGOtRKiIp4mfxP6kg';
	private $watch_url = 'https://www.youtube.com/watch?v=';
	
	public function Noticias(){
		return false;
	}
	
	public function Clima(){
		$xml = simplexml_load_file('https://www.yr.no/place/Chile/Santiago/Santiago/forecast.xml');
		
		$detalles = array();
		foreach($xml->forecast->tabular->time as $clima){
			$detalles[] = array(
				'desde' => $this->fecha((string) $clima['from']),
				'hasta' => $this->fecha((string) $clima['to']),
				'temperatura' => (string) $clima->temperature['value'],
				'precipitacion' => (string) $clima->precipitation['value'] . ' mm',
				'imagen' => 'https://www.yr.no/grafikk/sym/v2017/png/100/'.$clima->symbol['var'] . '.png',
				'condicion' => $this->Condicion((string) $clima->symbol['name'])
			);
		};
		
		$clima = array(
			'ciudad' => (string) $xml->location->name[0],
			'pais' => (string) $xml->location->country[0],
			'detalle' => $detalles
		);
		
		return  $clima;
		
	}
	
	public function Youtube(){
		$url = 'https://www.googleapis.com/youtube/v3/search?key='.$this->api_key.'&channelId='.$this->channelId.'&part=snippet,id&order=date&maxResults=12';
		$json = file_get_contents($url);
		$json = json_decode($json);
		
		$videos = array();
		foreach($json->items as $item){
			$videos[] = array(
				'id' =>$item->id->videoId,
				'titulo' =>$item->snippet->title,
				'descripcion' =>$item->snippet->description,
				'imagen' =>$item->snippet->thumbnails->high->url,
				'link' =>$this->watch_url . $item->id->videoId,
			);
		};
		
		return $videos;
	}
	
	public function YoutubePopular(){
		$url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet,id&chart=mostPopular&regionCode=CL&maxResults=10&key='.$this->api_key;
		$json = file_get_contents($url);
		$json = json_decode($json);
		
		$videos = array();
		foreach($json->items as $item){
			$videos[] = array(
				'id' =>$item->id,
				'titulo' =>$item->snippet->title,
				'descripcion' =>$item->snippet->description,
				'imagen' =>$item->snippet->thumbnails->high->url,
				'link' =>$this->watch_url . $item->id,
			);
		};
		
		return $videos;
	}
	
	private function Condicion($condicion){
		
		switch($condicion){
			case 'Clear sky': return 'Despejado'; break;
			case 'Partly cloudy': return 'Parcialmente nublado'; break;
			case 'Cloudy': return 'Nublado'; break;
			case 'Rain showers': return 'Gotas de lluvia'; break;
			case 'Light rain showers': return 'Pocas gotas de lluvia'; break;
			case 'Fair': return 'Parcialmente nublado'; break;
			default: return $condicion; break;
		}
		
	}
	
	private function fecha($fecha){
		return date("H:i d-m-Y", strtotime($fecha));
	}
}