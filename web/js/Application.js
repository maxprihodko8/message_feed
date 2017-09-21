var Application = angular.module('MessageFeed', []);
Application.controller('MessageFeedController', MessageFeedController);


function MessageFeedController($scope, $http) {
    $scope.messages = {};

    function getAllMessages() {
        $http({
            method: 'POST',
            url: '/messages',
            headers: {
                'Content-type': 'application/json',
                'Access-Control-Allow-Origin': '*'
            }
        }).then(function successCallback(response) {
            if (response !== null && response.status === 200) {
                $scope.messages = response.data;
            }
        }, function errorCallback(response) {
        });
    }
    getAllMessages();
}


