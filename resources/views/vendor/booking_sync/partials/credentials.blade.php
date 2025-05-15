@if($sourceType === 'google_calendar')
    <div class="mb-3">
        <label for="calendar_id" class="form-label">Calendar ID *</label>
        <input type="text" class="form-control" name="credentials[calendar_id]" 
               value="{{ old('credentials.calendar_id', $credentials['calendar_id'] ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="client_id" class="form-label">Client ID *</label>
        <input type="text" class="form-control" name="credentials[client_id]" 
               value="{{ old('credentials.client_id', $credentials['client_id'] ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="client_secret" class="form-label">Client Secret *</label>
        <input type="text" class="form-control" name="credentials[client_secret]" 
               value="{{ old('credentials.client_secret', $credentials['client_secret'] ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="refresh_token" class="form-label">Refresh Token</label>
        <input type="text" class="form-control" name="credentials[refresh_token]" 
               value="{{ old('credentials.refresh_token', $credentials['refresh_token'] ?? '') }}">
    </div>
@elseif($sourceType === 'outlook')
    <div class="mb-3">
        <label for="client_id" class="form-label">Client ID *</label>
        <input type="text" class="form-control" name="credentials[client_id]" 
               value="{{ old('credentials.client_id', $credentials['client_id'] ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="client_secret" class="form-label">Client Secret *</label>
        <input type="text" class="form-control" name="credentials[client_secret]" 
               value="{{ old('credentials.client_secret', $credentials['client_secret'] ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="tenant_id" class="form-label">Tenant ID *</label>
        <input type="text" class="form-control" name="credentials[tenant_id]" 
               value="{{ old('credentials.tenant_id', $credentials['tenant_id'] ?? '') }}" required>
    </div>
@elseif($sourceType === 'airbnb')
    <div class="mb-3">
        <label for="api_key" class="form-label">API Key *</label>
        <input type="text" class="form-control" name="credentials[api_key]" 
               value="{{ old('credentials.api_key', $credentials['api_key'] ?? '') }}" required>
    </div>
@elseif($sourceType === 'booking_com')
    <div class="mb-3">
        <label for="username" class="form-label">Username *</label>
        <input type="text" class="form-control" name="credentials[username]" 
               value="{{ old('credentials.username', $credentials['username'] ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password *</label>
        <input type="password" class="form-control" name="credentials[password]" 
               value="{{ old('credentials.password', $credentials['password'] ?? '') }}" required>
    </div>
@elseif($sourceType === 'expedia')
    <div class="mb-3">
        <label for="api_key" class="form-label">API Key *</label>
        <input type="text" class="form-control" name="credentials[api_key]" 
               value="{{ old('credentials.api_key', $credentials['api_key'] ?? '') }}" required>
    </div>
@endif
