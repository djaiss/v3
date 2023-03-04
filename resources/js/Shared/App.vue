<script setup>
</script>

<template>
  <Layout :layoutData="layoutData">
    <template #header>
      <Breadcrumb :items="[
        {
          name: $t('app.breadcrumb_settings'),
          url: route('settings.index'),
        },
        {
          name: 'Account and security ',
        },
      ]" />
    </template>

    <div class="relative">
      <div class="mx-auto max-w-3xl px-2 py-2 sm:py-6 sm:px-6 lg:px-8">
        <div class="mb-16" v-if="$page.props.jetstream.canUpdateProfileInformation">
          <UpdateProfileInformationForm :user="$page.props.user" />
        </div>

        <div class="mb-16" v-if="$page.props.jetstream.canUpdatePassword">
          <UpdatePasswordForm class="mt-10 sm:mt-0" />
        </div>

        <div class="mb-16" v-if="providersExists">
          <UpdateProviders :user="$page.props.user" :providers="providers" :userTokens="userTokens" />
        </div>

        <div class="mb-16" v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
          <TwoFactorAuthenticationForm :requires-confirmation="confirmsTwoFactorAuthentication" class="mt-10 sm:mt-0" />
        </div>

        <div class="mb-16">
          <WebauthnKeys :webauthnKeys="webauthnKeys" />
        </div>

        <div class="mb-16">
          <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" />
        </div>

        <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
          <DeleteUserForm class="mt-10 sm:mt-0" />
        </template>
      </div>
    </div>
  </Layout>
</template>
