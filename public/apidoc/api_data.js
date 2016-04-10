define({ "api": [
  {
    "type": "any",
    "url": "/api/non-existent-url",
    "title": "404",
    "permission": [
      {
        "name": "none"
      }
    ],
    "version": "1.0.0",
    "name": "RequestResource",
    "group": "Exceptions",
    "examples": [
      {
        "title": "Example usage:",
        "content": "curl -i -H \"Accept: application/json\" -H \"Content-Type: application/json\" -X GET \"http://api-clothesai.herokuapp.com/api/non-existent\" | json",
        "type": "curl"
      }
    ],
    "success": {
      "examples": [
        {
          "title": "NotFound-Response:",
          "content": "HTTP/1.1 404 Not Found\n{\n     \"error\": {\n         \"message\": \"Not Found. See http://api-clothesai.herokuapp.com/doc\",\n         \"status_code\": 404\n     }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Controllers/Api/ApiController.php",
    "groupTitle": "Exceptions"
  }
] });
