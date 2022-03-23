 <div class="p-2 w-3/5">
     <div class="relative">
         <label for="new_detail_tag" class="leading-7 text-sm text-gray-600">New_Detail_Tag</label>
         <input type="text" id="new_detail_tag" name="new_detail_tag" value="{{ old('new_detail_tag') }}"
             class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
     </div>
 </div>
 <div class="p-2 w-2/5">
     <div class="relative">
         <label for="existing_detail_tag" class="leading-7 text-sm text-gray-600">Existing_Detail_Tag
             <select class="form-select w-full" id="existing_detail_tag" name="existing_detail_tag">
                 <option class="font-semibold text-indigo-700">
                 </option>
                 @foreach ($detailtags as $detailtag)
                     <option value="{{ $detailtag->id }}"
                         {{ $detailtag['id'] == $key['detailtag_id'] ? 'selected' : '' }}>
                         {{ $detailtag->name }}
                     </option>
                 @endforeach
             </select>
         </label>
     </div>
 </div>
