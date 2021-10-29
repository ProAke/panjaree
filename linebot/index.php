<?php error_reporting(E_ALL ^ E_NOTICE);
/*****************************************************************
Created :26/10/2021
Author : worapot bhilarbutra (pros.ake)
E-mail : worapot.bhi@gmail.com
Website : https://www.vpslive.com
Copyright (C) 2021-2025, VPS Live Digital togethers all rights reserved.
 *****************************************************************/
include_once("../include/config.inc.php");


/*Get Data From POST Http Request*/
$datas = file_get_contents('php://input');
/*Decode Json From LINE Data Body*/
$deCode = json_decode($datas, true);

file_put_contents('log/log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

$replyToken = $deCode['events'][0]['replyToken'];
$userId = $deCode['events'][0]['source']['userId'];
$userName = $deCode['events'][0]['source']['displayName'];
$text = $deCode['events'][0]['message']['text'];


require 'sendMessage.php';

$flexDataJson = '{
	  "type": "flex",
	  "altText": "Flex Message",
	  "contents": {
	    "type": "carousel",
	    "contents": [
	      {
	        "type": "bubble",
	        "hero": {
	          "type": "image",
	          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png",
	          "size": "full",
	          "aspectRatio": "20:13",
	          "aspectMode": "cover"
	        },
	        "body": {
	          "type": "box",
	          "layout": "vertical",
	          "spacing": "sm",
	          "contents": [
	            {
	              "type": "text",
	              "text": "Arm Chair, White",
	              "size": "xl",
	              "weight": "bold",
	              "wrap": true
	            },
	            {
	              "type": "box",
	              "layout": "baseline",
	              "contents": [
	                {
	                  "type": "text",
	                  "text": "$49",
	                  "flex": 0,
	                  "size": "xl",
	                  "weight": "bold",
	                  "wrap": true
	                },
	                {
	                  "type": "text",
	                  "text": ".99",
	                  "flex": 0,
	                  "size": "sm",
	                  "weight": "bold",
	                  "wrap": true
	                }
	              ]
	            }
	          ]
	        },
	        "footer": {
	          "type": "box",
	          "layout": "vertical",
	          "spacing": "sm",
	          "contents": [
	            {
	              "type": "button",
	              "action": {
	                "type": "uri",
	                "label": "Add to Cart",
	                "uri": "https://linecorp.com"
	              },
	              "style": "primary"
	            },
	            {
	              "type": "button",
	              "action": {
	                "type": "uri",
	                "label": "Add to whishlist",
	                "uri": "https://linecorp.com"
	              }
	            }
	          ]
	        }
	      },
	      {
	        "type": "bubble",
	        "hero": {
	          "type": "image",
	          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png",
	          "size": "full",
	          "aspectRatio": "20:13",
	          "aspectMode": "cover"
	        },
	        "body": {
	          "type": "box",
	          "layout": "vertical",
	          "spacing": "sm",
	          "contents": [
	            {
	              "type": "text",
	              "text": "Metal Desk Lamp",
	              "size": "xl",
	              "weight": "bold",
	              "wrap": true
	            },
	            {
	              "type": "box",
	              "layout": "baseline",
	              "flex": 1,
	              "contents": [
	                {
	                  "type": "text",
	                  "text": "$11",
	                  "flex": 0,
	                  "size": "xl",
	                  "weight": "bold",
	                  "wrap": true
	                },
	                {
	                  "type": "text",
	                  "text": ".99",
	                  "flex": 0,
	                  "size": "sm",
	                  "weight": "bold",
	                  "wrap": true
	                }
	              ]
	            },
	            {
	              "type": "text",
	              "text": "Temporarily out of stock",
	              "flex": 0,
	              "margin": "md",
	              "size": "xxs",
	              "color": "#FF5551",
	              "wrap": true
	            }
	          ]
	        },
	        "footer": {
	          "type": "box",
	          "layout": "vertical",
	          "spacing": "sm",
	          "contents": [
	            {
	              "type": "button",
	              "action": {
	                "type": "uri",
	                "label": "Add to Cart",
	                "uri": "https://linecorp.com"
	              },
	              "flex": 2,
	              "color": "#AAAAAA",
	              "style": "primary"
	            },
	            {
	              "type": "button",
	              "action": {
	                "type": "uri",
	                "label": "Add to wish list",
	                "uri": "https://linecorp.com"
	              }
	            }
	          ]
	        }
	      },
	      {
	        "type": "bubble",
	        "body": {
	          "type": "box",
	          "layout": "vertical",
	          "spacing": "sm",
	          "contents": [
	            {
	              "type": "button",
	              "action": {
	                "type": "uri",
	                "label": "See more",
	                "uri": "https://linecorp.com"
	              },
	              "flex": 1,
	              "gravity": "center"
	            }
	          ]
	        }
	      }
	    ]
	  }
	}';
$flexDataJsonDeCode = json_decode($flexDataJson, true);
$datas['url'] = "https://api.line.me/v2/bot/message/push";
$datas['token'] = "PipIwu3mnNEqEtvNFle3e1SwXnBhU/9VOKvm3X7T0Rwa5QFTZzVK3PDWfcjaqq1qwA5T0O1wpr0KHuootMeArUg8LFAJEuM9groAcBqcsf5oIstDSWUH+6W1m+aYOCSilMtGxr3ugzp/xxWhFOTaZAdB04t89/1O/w1cDnyilFU=";
$messages['to'] = $userId;
$messages['messages'][] = $flexDataJsonDeCode;
$encodeJson = json_encode($messages);


sentMessage($encodeJson, $datas);
http_response_code(200);
