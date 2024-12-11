<?php
session_start();

// Initialize tasks if not already set
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['task'])) {
        // Add a new task with 'pending' status
        $_SESSION['tasks'][] = ['task' => $_POST['task'], 'status' => 'pending'];
    } elseif (isset($_POST['delete'])) {
        // Delete a task
        unset($_SESSION['tasks'][$_POST['delete']]);
    } elseif (isset($_POST['edit'])) {
        // Edit a task
        $_SESSION['tasks'][$_POST['edit']]['task'] = $_POST['new_task'];
    } elseif (isset($_POST['status'])) {
        // Toggle task status between 'pending' and 'completed'
        $status = $_SESSION['tasks'][$_POST['status']]['status'];
        $_SESSION['tasks'][$_POST['status']]['status'] = $status == 'pending' ? 'completed' : 'pending';
    } elseif (isset($_POST['clear'])) {
        // Clear all tasks
        $_SESSION['tasks'] = [];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced PHP To-Do List</title>
    <style>
        .completed {
            text-decoration: line-through;
            color: gray;
        }
    </style>
</head>
<body>

    <h1>Enhanced PHP To-Do List</h1>

    <!-- Form to add a new task -->
    <form method="post">
        <input type="text" name="task" placeholder="Enter new task" required>
        <input type="submit" value="Add Task">
    </form>

    <!-- Display the list of tasks -->
    <ul>
        <?php foreach ($_SESSION['tasks'] as $index => $taskData): ?>
            <li>
                <span class="<?php echo $taskData['status'] == 'completed' ? 'completed' : ''; ?>">
                    <?php echo htmlspecialchars($taskData['task']); ?>
                </span>

                <!-- Form to edit the task -->
                <form method="post" style="display:inline;">
                    <input type="hidden" name="edit" value="<?php echo $index; ?>">
                    <input type="text" name="new_task" placeholder="Edit task" required>
                    <input type="submit" value="Edit">
                </form>

                <!-- Form to toggle task status -->
                <form method="post" style="display:inline;">
                    <input type="hidden" name="status" value="<?php echo $index; ?>">
                    <input type="submit" value="<?php echo $taskData['status'] == 'pending' ? 'Mark as Completed' : 'Mark as Pending'; ?>">
                </form>

                <!-- Form to delete the task -->
                <form method="post" style="display:inline;">
                    <input type="hidden" name="delete" value="<?php echo $index; ?>">
                    <input type="submit" value="Delete">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Form to clear all tasks -->
    <form method="post">
        <input type="hidden" name="clear" value="true">
        <input type="submit" value="Clear All Tasks">
    </form>

</body>
</html>

