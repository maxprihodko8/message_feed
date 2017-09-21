var Application = angular.module('MessageFeed', []);
Application.controller('MessageFeedController', MessageFeedController);


function MessageFeedController($scope, $http) {
    $scope.messages = {};
    $scope.lastMessageId = 0;

    function getMessages() {
        var url = '/messages';
        if ($scope.lastMessageId !== 0) {
            url = url.concat('/since_id=');
            url = url.concat($scope.lastMessageId);
        }
        $http({
            method: 'POST',
            url: url,
            headers: {
                'Content-type': 'application/json',
                'Access-Control-Allow-Origin': '*'
            }
        }).then(function successCallback(response) {
            if (response !== null && response.status === 200) {
                if ($scope.lastMessageId === 0) {
                    $scope.messages = response.data.messages;
                } else {
                    if (response.data !== null && response.data.messages instanceof Array) {
                        var new_messages = response.data.messages;
                        insertAtArray(new_messages);
                    }
                }
                getLastMessageId($scope.messages);
            }
        }, function errorCallback(response) {
        });
    }

    function getLastMessageId(array) {
        for (i in array) {
            if (array[i].id > $scope.lastMessageId) {
                $scope.lastMessageId = array[i].id;
            }
        }
    }

    function insertAtArray(new_messages) {
        if ($scope.messages.length + new_messages.length > 25) {
            $scope.messages = $scope.messages.slice(0, 25 - ($scope.messages.length + new_messages.length - 25));
        }
        for (i in new_messages) {
            if (new_messages[i].id !== $scope.lastMessageId) {
                $scope.messages.unshift(new_messages[i]);
            }
        }
    }

    function callback() {
        getMessages();
        setTimeout(callback, 700);
    }
    callback();
}


