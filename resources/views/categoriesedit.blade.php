<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Edit') }} <!-- Correction de la casse -->
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <div class="container h-100 mt-5">
                      <div class="row h-100 justify-content-center align-items-center">
                          <div class="col-10 col-md-8 col-lg-6">
                              <h3>Edit Category</h3> 
                              <form action="{{ route('categories.update', $category->id) }}" method="post">
                                  @csrf
                                  @method('PUT')
                                  <div class="form-group">
                                      <label for="title">Title</label>
                                      <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}" required>
                                  </div>

                                
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4">{{ $category->description }}</textarea>
                                    </div>

                                
                                    <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                    </div>

                                <button type="submit" class="btn mt-3 btn-primary">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</x-app-layout>

