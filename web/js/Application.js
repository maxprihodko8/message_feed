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
                //'X-CSRF-Token': $('meta[name=csrf-token]').attr('content'),
                'Access-Control-Allow-Origin': '*'
            }
        }).then(function successCallback(response) {
            if (response !== null && response.status === 200) {
                $scope.messages = response.data;
            }
        }, function errorCallback(response) {
            if (response !== null) {
                if (response.status === 503) {
                    alert("Ошибка при запросе данных с сервера");
                } else if (response.status === 404) {
                    alert("Нет такого маршрута");
                } else {
                    alert("Неизвестная ошибка");
                }
            }
        });
    }
    getAllMessages();
}


