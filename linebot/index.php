<?php

var ACCESS_TOKEN = 'PipIwu3mnNEqEtvNFle3e1SwXnBhU/9VOKvm3X7T0Rwa5QFTZzVK3PDWfcjaqq1qwA5T0O1wpr0KHuootMeArUg8LFAJEuM9groAcBqcsf5oIstDSWUH+6W1m+aYOCSilMtGxr3ugzp/xxWhFOTaZAdB04t89/1O/w1cDnyilFU=';
var FOLDER_ID = '1rMxNSLDcuRuIZmCAn77IoZLNkgohVx8a';
var REPLY_URL = 'https://api.line.me/v2/bot/message/reply';

function sendMsg(url, payload) {
  UrlFetchApp.fetch(url, {
    'headers': {
      'Content-Type': 'application/json; charset=UTF-8',
      'Authorization': 'Bearer ' + ACCESS_TOKEN,
    },
    'method': 'post',
    'payload': JSON.stringify(payload),
  });
}
function getImage(id) {
 
  var url = 'https://api-data.line.me/v2/bot/message/' + id + '/content';
  var data = UrlFetchApp.fetch(url,{
    'headers': {
      'Authorization' :  'Bearer ' + ACCESS_TOKEN,
    },
    'method': 'get'
  });
  
  var img = data.getBlob().getAs('image/png').setName(Number(new Date()) + '.png');
  return img;
}
function saveImage(blob) {
  try{
    var folder = DriveApp.getFolderById(FOLDER_ID);
    var file = folder.createFile(blob);
    return file.getUrl();
  }catch(e){
    return false;
  }
}
function doPost(e) {
  var event = JSON.parse(e.postData.contents).events[0];
  if(event.message.type == 'image') {
    try {
      var img = getImage(event.message.id);
      var url = saveImage(img);
      sendMsg(REPLY_URL, {
        'replyToken': event.replyToken,
        'messages': [{
          'type': 'text',
          'text': url ? "บันทึกแล้ว:\n" + url : "ข้อผิดพลาดในการดาวน์โหลด",
        }]
      })
    }catch(e) {
      Logger.log(e);
    }
  }
  return ContentService.createTextOutput(JSON.stringify({'content': 'post ok'})).setMimeType(ContentService.MimeType.JSON);
}