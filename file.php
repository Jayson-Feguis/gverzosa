<label for="editcustomerimage">Customer Image</label>
<input type="file" name="editcustomerimage" id="editcustomerimage" accept="image/*" class="block border border-grey-light w-full p-3 rounded mb-4" required>
<label for="editcustomername">Customer Name</label>
<input type="text" id="editcustomername" name="editcustomername" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan delacruz" required>
<label for="editcustomeremail">Email</label>
<input type="email" id="editcustomeremail" name="editcustomeremail" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan@gmail.com" required>
<label for="editcustomernumber">Mobile Number</label>
<input type="number" id="editcustomernumber" name="editcustomernumber" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. 09261905272" required>
<label for="editcustomeraddress">Address</label>
<input type="text" id="editcustomeraddress" name="editcustomeraddress" class="block border border-grey-light w-full p-3 rounded mb-4" placeholder="ex. Juan" required>
<label for="editcustomerlname">Gender</label>
<div class="flex flex-row justify-flex-start">
    <div class="flex-row">
        <div class="form-check">
            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="editcustomergender" value="Male" id="customergender">
            <label class="form-check-label inline-block text-gray-800" for="customergender">
                Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="editcustomergender" value="Female" id="flexRadioDefault2">
            <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault2">
                Female
            </label>
        </div>
    </div>
</div>