<?php
require_once "importance.php";

?>

<html>

<head>
    <title>Message - <?php echo CONFIG::SYSTEM_NAME; ?></title>
    <?php require_once "./inc/head.inc.php";  ?>
</head>

<body style="background-color: white">
    <?php require_once "./inc/header.inc.php"; ?>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-2'><?php require_once "./inc/sidebar.inc.php"; ?></div> <!-- this should be a sidebar -->
            <div class='col-md-10'>
                <div class='content-area'>
                    <div class='content-header' style="background-color: white">
                        Calendar<small></small>
                    </div>
                    <div class="main">
                        <div id="dp"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script type="text/javascript">
        var dp = new DayPilot.Scheduler("dp");

        dp.treeEnabled = true;

        dp.scale = "Day";
        dp.startDate = new DayPilot.Date().firstDayOfMonth();
        dp.days = dp.startDate.daysInMonth();

        dp.timeHeaders = [{
                groupBy: "Month",
                format: "MMMM yyyy"
            },
            {
                groupBy: "Day",
                format: "d"
            },
        ];

        dp.cellWidthSpec = "Auto";
        dp.eventHeight = 40;

        dp.eventDeleteHandling = "Update";

        // http://api.daypilot.org/daypilot-scheduler-oneventmoved/
        dp.onEventMoved = function(args) {
            DayPilot.Http.ajax({
                url: "backend_move.php",
                data: {
                    id: args.e.id(),
                    newStart: args.newStart.toString(),
                    newEnd: args.newEnd.toString(),
                    newResource: args.newResource,
                },
                success: function() {
                    dp.message("Moved.");
                },
            });
        };

        // http://api.daypilot.org/daypilot-scheduler-oneventresized/
        dp.onEventResized = function(args) {
            DayPilot.Http.ajax({
                url: "backend_resize.php",
                data: {
                    id: args.e.id(),
                    newStart: args.newStart.toString(),
                    newEnd: args.newEnd.toString(),
                },
                success: function() {
                    dp.message("Resized.");
                },
            });
        };

        dp.onEventDeleted = function(args) {
            DayPilot.Http.ajax({
                url: "backend_delete.php",
                data: {
                    id: args.e.id(),
                },
                success: function() {
                    dp.message("Deleted.");
                },
            });
        };

        dp.onTimeRangeSelected = function(args) {
            var form = [{
                    name: "Text",
                    id: "text"
                },
                {
                    name: "Start",
                    id: "start",
                    dateFormat: "M/d/yyyy h:mm:ss tt",
                },
                {
                    name: "End",
                    id: "end",
                    dateFormat: "M/d/yyyy h:mm:ss tt",
                },
                {
                    name: "Resource",
                    id: "resource",
                    options: flatten(dp.resources),
                },
            ];

            var data = {
                start: args.start,
                end: args.end,
                resource: args.resource,
                text: "New event",
            };

            var options = {
                focus: "text",
            };

            DayPilot.Modal.form(form, data, options).then(function(modal) {
                dp.clearSelection();
                if (modal.canceled) {
                    return;
                }
                DayPilot.Http.ajax({
                    url: "backend_create.php",
                    data: modal.result,
                    success: function(response) {
                        modal.result.id = response.data.id;
                        dp.events.add(modal.result);
                        dp.message("Created.");
                    },
                });
            });
        };

        dp.onEventClick = function(args) {
            var form = [{
                    name: "Text",
                    id: "text"
                },
                {
                    name: "Start",
                    id: "start",
                    dateFormat: "M/d/yyyy h:mm:ss tt",
                },
                {
                    name: "End",
                    id: "end",
                    dateFormat: "M/d/yyyy h:mm:ss tt",
                },
                {
                    name: "Resource",
                    id: "resource",
                    options: flatten(dp.resources),
                },
            ];

            var data = args.e.data;

            var options = {
                focus: "text",
            };

            DayPilot.Modal.form(form, data, options).then(function(modal) {
                dp.clearSelection();
                if (modal.canceled) {
                    return;
                }
                DayPilot.Http.ajax({
                    url: "backend_update.php",
                    data: modal.result,
                    success: function(response) {
                        console.log("Updating data", modal.result);
                        dp.events.update(modal.result);
                        dp.message("Updated.");
                    },
                });
            });
        };

        dp.onBeforeEventRender = function(args) {
            args.data.barHidden = true;
            args.data.backColor = "#6d9eeb";
            args.data.borderColor = "darker";
            args.data.fontColor = "white";
        };

        dp.init();

        loadResources();
        loadEvents();

        function loadEvents() {
            dp.events.load("backend_patient_events.php");
        }

        function loadResources() {
            dp.rows.load("backend_patient_resource.php");
        }

        function flatten(resources, result) {
            result = result || [];

            resources &&
                resources.forEach(function(r) {
                    result.push(r);
                    flatten(r.children, result);
                });

            return result;
        }
    </script>
</body>

</html>