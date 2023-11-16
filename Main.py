# import pandas as pd
# import matplotlib.pyplot as plt

# df = pd.read_csv('data.csv')

# print(df)

# # Plot the data as a line chart
# df.set_index('Name', inplace=True)  # Set 'Name' column as the index
# df.T.plot(kind='line')  # Transpose DataFrame and plot
# # df.plot(x='Name', y=['Jan', 'Feb', 'Mar', 'Apri', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], kind='line')
# plt.xlabel('Month')
# plt.ylabel('Amount')
# plt.title("Month wise Graph")
# plt.legend(title='Name')
# plt.show()

# import pandas as pd
# import matplotlib.pyplot as plt

# df = pd.read_csv('data.csv')

# df.set_index('Name', inplace=True)  # Set 'Name' column as the index

# # Transpose the DataFrame
# df_transposed = df.T

# # Get the months as y-axis values
# months = df_transposed.columns

# # Plot the data as a line chart
# for month in months:
#     values = df_transposed[month]
#     plt.plot(values, [month] * len(values), marker='o')

#     # Add data labels
#     for i, value in enumerate(values):
#         plt.text(value, month, str(value), ha='left', va='center')

# # Set the x-axis and y-axis labels
# plt.xlabel('Amount')
# plt.ylabel('Month')
# plt.title("Month-wise Graph")

# plt.show()



# import pandas as pd
# import matplotlib.pyplot as plt

# df = pd.read_csv('data2.csv')

# # Extract the month and amount data
# months = df['Month']
# earnings = df['Amount']

# # Create the plot
# plt.plot(earnings, months, marker='o')

# # Add data labels
# for i, j in zip(earnings, months):
#     plt.text(i, j, str(i))

# # Set the y-axis and x-axis labels
# plt.ylabel('Month')
# plt.xlabel('Amount')
# plt.title('Month-wise Earnings')

# # Display the plot
# plt.show()


# Name     Jan  Feb  Mar  Apr  May  Jun  Jul  Aug  Sep  Oct  Nov  Dec
# Dimple  1000  5000 2000 3000 1000 4000 5000 1000 4000 6000 7000 8000


# import pandas as pd
# import matplotlib.pyplot as plt

# df = pd.read_csv('data.csv', index_col='Name')

# # Extract the months and earnings data
# months = df.columns
# earnings = df.loc['Dimple']

# # Create the plot
# plt.plot(earnings, months, marker='o')

# # Add data labels
# for month, earning in zip(months, earnings):
#     plt.text(earning, month, str(earning))

# # Set the y-axis and x-axis labels
# plt.ylabel('Month')
# plt.xlabel('Amount')
# plt.title('Month-wise Earnings')

# # Display the plot
# plt.show()



#correct input as single input
# import pandas as pd
# import matplotlib.pyplot as plt
# import seaborn as sns

# df = pd.read_csv('data.csv')
# name = df.columns[0]  # Extract the name from the first column

# # Extract the months and earnings data
# months = df.columns[1:]
# earnings = df.iloc[0, 1:]  # Assuming the first row corresponds to the name


# # Set the Seaborn style
# sns.set(style="whitegrid")


# # Create the plot
# plt.plot(earnings, months, marker='o')

# # Add data labels
# for month, earning in zip(months, earnings):
#     plt.text(earning, month, str(earning))

# # Set the y-axis and x-axis labels
# plt.ylabel('Month')
# plt.xlabel('Amount')
# plt.title('Month-wise Earnings for ' + name)

# # Display the plot
# plt.show()

########################################

# import pandas as pd
# import matplotlib.pyplot as plt

# df = pd.read_csv('data.csv')
# names = df.iloc[:, 0]  # Extract all names from the first column
# months = df.columns[1:]  # Extract the months
# earnings = df.iloc[:, 1:]  # Extract all earnings data

# # Set the bar width
# bar_width = 0.8 / len(names)

# # Create the plot for each name
# for i in range(len(names)):
#     name = names[i]
#     earning_data = earnings.iloc[i]
#     x = [j + bar_width * i for j in range(len(months))]
#     plt.bar(x, earning_data, width=bar_width, label=name)

# # Set the x-axis ticks and labels
# plt.xticks([j + bar_width * (len(names) - 1) / 2 for j in range(len(months))], months)

# # Set the y-axis label
# plt.ylabel('Amount')

# # Set the plot title
# plt.title('Month-wise Earnings')

# # Add legend
# plt.legend()

# # Display the plot
# plt.show()





import pandas as pd
import matplotlib.pyplot as plt

df = pd.read_csv('data.csv')
names = df.iloc[:, 0]  # Extract all names from the first column
months = df.columns[1:]  # Extract the months
earnings = df.iloc[:, 1:]  # Extract all earnings data

# Set the bar width
bar_width = 0.8 / len(names)

# Create the plot for each name
for i in range(len(names)):
    name = names[i]
    earning_data = earnings.iloc[i]
    x = [j + bar_width * i for j in range(len(months))]
    plt.bar(x, earning_data, width=bar_width, label=name)

    # Add data labels above each bar
    for j in range(len(months)):
        plt.text(x[j], earning_data[j] + 100, str(earning_data[j]), ha='center')

# Set the x-axis ticks and labels
plt.xticks([j + bar_width * (len(names) - 1) / 2 for j in range(len(months))], months)

# Set the y-axis label
plt.ylabel('Amount')
plt.xlabel('Month')

# Set the plot title
plt.title('Month-wise Earnings')

# Add legend
plt.legend()

# Display the plot
plt.show()









#######################################################



#Correct Results For Multiple Inputs in CSV
# import pandas as pd
# import matplotlib.pyplot as plt

# df = pd.read_csv('data_1.csv')
# names = df.iloc[:, 0]  # Extract all names from the first column
# months = df.columns[1:]  # Extract the months
# earnings = df.iloc[:, 1:]  # Extract all earnings data

# # Create the plot for each name
# for i in range(len(names)):
#     name = names[i]
#     earning_data = earnings.iloc[i]

#     plt.plot(earning_data, months, marker='o')

#     # Add data labels
#     for month, earning in zip(months, earning_data):
#         plt.text(earning, month, str(earning))

# # Set the y-axis and x-axis labels
# plt.ylabel('Month')
# plt.xlabel('Amount')
# plt.title('Month-wise Earnings')

# # Add legend
# plt.legend(names)

# # Display the plot
# plt.show()
