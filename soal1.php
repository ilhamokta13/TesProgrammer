<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RAID Calculator</title>
    <script>
        function validateNumber(input) {
            if (isNaN(input.value) || input.value < 1 || input.value > 8) {
                alert("Please enter a valid number between 1 and 8.");
                input.value = 1;
            }
            updateRaidOptions();
        }

        function updateRaidOptions() {
            let numberOfDisks = document.getElementById('num_disks').value;
            let raidType = document.getElementById('raid_type');
            raidType.innerHTML = "";

            if (numberOfDisks >= 2) {
                raidType.options.add(new Option("RAID-1", "RAID-1"));
            }
            if (numberOfDisks >= 3) {
                raidType.options.add(new Option("RAID-5", "RAID-5"));
            }
            if (numberOfDisks > 2 && numberOfDisks % 2 === 0) {
                raidType.options.add(new Option("RAID-10", "RAID-10"));
            }
            raidType.options.add(new Option("RAID-0", "RAID-0"));
        }

        function calculateRaid() {
            let numberOfDisks = document.getElementById('num_disks').value;
            let sizePerDisk = document.getElementById('size_disk').value;
            let raidType = document.getElementById('raid_type').value;

            let capacity = 0;
            let faultTolerance = 0;

            if (raidType === "RAID-0") {
                capacity = numberOfDisks * sizePerDisk;
                faultTolerance = 0;
            } else if (raidType === "RAID-1") {
                capacity = sizePerDisk;
                faultTolerance = numberOfDisks - 1;
            } else if (raidType === "RAID-5") {
                capacity = (numberOfDisks - 1) * sizePerDisk;
                faultTolerance = 1;
            } else if (raidType === "RAID-10") {
                capacity = (numberOfDisks / 2) * sizePerDisk;
                faultTolerance = 1;
            }

            document.getElementById('capacity').innerText = "Capacity: " + capacity + " GB";
            document.getElementById('fault_tolerance').innerText = "Fault Tolerance: " + faultTolerance;
        }
    </script>
</head>
<body>
    <h2>RAID Calculator</h2>
    <form>
        <label for="num_disks">Number of Disks:</label>
        <input type="text" id="num_disks" value="1" onblur="validateNumber(this)">
        <br>

        <label for="size_disk">Size per Disk:</label>
        <select id="size_disk">
            <option value="300">300 GB</option>
            <option value="500">500 GB</option>
            <option value="1000">1 TB</option>
            <option value="2000">2 TB</option>
        </select>
        <br>

        <label for="raid_type">RAID Type:</label>
        <select id="raid_type">
            <option value="RAID-0">RAID-0</option>
        </select>
        <br>

        <button type="button" onclick="calculateRaid()">Calculate</button>
    </form>
    <p id="capacity">Capacity: </p>
    <p id="fault_tolerance">Fault Tolerance: </p>
</body>
</html>
