var Application = angular.module('MessageFeed', []);
Application.controller('MessageFeedController', MessageFeedController);


function MessageFeedController($scope, $http) {
    $scope.messages = {};
    $scope.lastMessageId = 0;

    function getMessages() {
        var url = '/messages';
        if ($scope.lastMessageId !== null && $scope.lastMessageId !== 0) {
            url = url.concat('/since_id=');
            url = url.concat($scope.lastMessageId);
            console.log(url);
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
                $scope.messages = response.data;
                getLastMessageId();
            }
        }, function errorCallback(response) {
        });
    }

    function getLastMessageId() {
        for (i in $scope.messages) {
            if ($scope.messages[i].id > $scope.lastMessageId) {
                $scope.lastMessageId = $scope.messages[i].id;
            }
        }
    }

    function callback() {
        getMessages();
        setTimeout(callback, 5000);
    }
    callback();
}


