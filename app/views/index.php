<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message feed application</title>
    <link rel="stylesheet" href="/web/css/style.css">
</head>

<body>

<div ng-app="MessageFeed" ng-controller="MessageFeedController" class="ng-cloak">
    <span class="errors_field">
        {{errors}}
    </span>
    <ul ng-repeat="message in messages">
        <li>
            {{message.id}}
        </li>
        <li>
            {{message.text}}
        </li>
        <li>
            {{message.date}}
        </li>
    </ul>
</div>

</body>

<!--  scripts  -->
<script src="/web/js/angular.min.js"></script>
<script src="/web/js/Application.js"></script>
<!-- /scripts  -->

</html>