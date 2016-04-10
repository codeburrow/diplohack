define({ "api": [
  {
    "type": "get",
    "url": "api/v1/funds",
    "title": "",
    "permission": [
      {
        "name": "none"
      }
    ],
    "version": "1.0.0",
    "name": "GetFunds",
    "group": "Funds",
    "description": "<p>Fetch list, with funds.</p>",
    "examples": [
      {
        "title": "Example usage:",
        "content": "\ncurl -i -H \"Accept: application/json\" -H \"Content-Type: application/json\" -X GET \"http://diplohack.herokuapp.com/api/v1/funds\"",
        "type": "curl"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "funds",
            "description": "<p>The array with funds.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "title",
            "description": "<p>Title of funding.</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "urls",
            "description": "<p>The array with urls.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>The description of a fund.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n    \"data\" :  [\n        {\n            \"title\": \"Funding Title\",\n            \"description\": \"Funding Description\",\n            \"url\": [\n                {\n                    \"url1\",\n                    \"url2\",\n                }\n            ]\n        },\n        {\n            \"title\": \"Funding Title 2\",\n            \"description\": \"Funding Description 2\",\n            \"url\": [\n                {\n                    \"url1\",\n                    \"url2\",\n                }\n            ]\n        }\n    ],\n}",
          "type": "json"
        }
      ]
    },
    "filename": "app/Controllers/Api/ApiFundsController.php",
    "groupTitle": "Funds"
  }
] });
